<?php

namespace Arma\Auth\Wordpress; 

use Flarum\Http\Controller\ControllerInterface;
use Flarum\Forum\AuthenticationResponseFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Flarum\Settings\SettingsRepositoryInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Arma\Auth\Wordpress\Server\Wordpress;

class WordpressAuthController implements ControllerInterface {

	protected $authResponse;

	protected $settings;

	public function __construct(AuthenticationResponseFactory $authResponse, SettingsRepositoryInterface $settings) {
		$this->authResponse = $authResponse;
		$this->settings = $settings;
	}

	public function handle(Request $request) {
		$redirectUri = (string) $request->getAttribute('originalUri', $request->getUri())->withQuery('');

		$server = new Wordpress([
			'identifier' => '9FkG0vl5qR14',//$this->settings->get('arma-auth-wordpress.client_key'),
			'secret' => 'IoxoZAHhDW3zAjIY8Mf2Xp5TnnligWUmB7WFnOzmExrNSDdE',//$this->settings->get('arma-auth-wordpress.client_secret'),
			'callbac_uri' => $redirectUri
		]);

		$session = $request->getAttribute('session');
		$queryParams = $request->getQueryParams();
		$oAuthToken = array_get($queryParams, 'oauth_token');
		$oAuthVerifier = array_get($queryParams, 'oauth_verifier');

		if (!$oAuthToken || !$oAuthVerifier) {
			$temporaryCredentials = $server->getTemporaryCredentials();

			$session->set('temporary_credentials', serialize($temporaryCredentials));
			$session->save();

			$server->authorize($temporaryCredentials);
			exit;
		}

		$temporaryCredentials = unserialize($session->get('temporary_credentials'));

		$tokenCredentials = $server->getTokenCredentials($temporaryCredentials, $oAuthToken, $oAuthVerifier);

		//TODO: log in user with user details
		$user = $server->getUserDetails($tokenCredentials);

		$suggestions = [
            'username' => $user->nickname
        ];

        return $this->authResponse->make($request, $suggestions);
	}

}