<?php
namespace Arma\Auth\Wordpress\Server;

use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;

class Wordpress extends Server {

	public function urlTemporaryCredentials() {
		return 'http://139.59.143.93/oauth1/request';
	}

	public function urlAuthorization() {
		return 'http://139.59.143.93/oauth1/authorize';
	}

	public function urlTokenCredentials() {
		return 'http://139.59.143.93/oauth1/access';
	}

	public function urlUserDetails() {
		return 'http://139.59.143.93/wp-json/wp/v2/users/me?_envelope';
	}

	//TODO: return  logged in user
	public function userDetails($data, TokenCredentials $tokenCredentials) {
	}

	public function userUid($data, TokenCredentials $tokenCredentials) {
		return $data['id'];
	}

	public function userEmail($data, TokenCredentials $tokenCredentials) {
		return;
	}

	public function userScreenName($data, TokenCredentials $tokenCredentials) {
		return $data['name'];
	}

}