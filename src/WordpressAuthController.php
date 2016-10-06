<?php

namespace Arma\Auth\Wordpress; 

use Flarum\Http\Controller\ControllerInterface;
use Flarum\Forum\AuthenticationResponseFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Flarum\Settings\SettingsRepositoryInterface;
use Arma\Auth\Wordpress\Server\Wordpress;

class WordpressAuthController implements ControllerInterface {

	protected $authResponse;

	protected $settings;

	public function __construct(AuthenticationResponseFactory $authResponse, SettingsRepositoryInterface $settings) {
		$this->authResponse = $authResponse;
        $this->settings = $settings;
	}

	public function handle(Request $request, array $routeParams = []) {
		$redirectUri = (string) $request->getAttribute('originalUri', $request->getUri())->withQuery('');

		//server class (wordpress site)
        /*
        * $this->settings->get('arma-auth-wordpress.app_id')
        * $this->settings->get('arma-auth-wordpress.app_secret')
        * $this->settings->get('arma-auth-wordpress.wp_site_url')
        */
		$server = new Wordpress([
			'identifier' => '9FkG0vl5qR14',
			'secret' => 'fZXTmwoq9nR8XanCUEXrdzACNyw5nQUY99a7igzM4wl6qtX3',
			'callbac_uri' => $redirectUri
		], null, $redirectUri, 'http://139.59.143.93');

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

		$user = $server->getUserDetails($tokenCredentials);

		$identification = ['wordpress_id' => $user->uid];
		$suggestions = [
            'username' => $user->nickname,
            'avatarUrl' => str_replace('_normal', '', $user->imageUrl)
        ];

        return $this->authResponse->make($request, $identification, $suggestions);
	}

}