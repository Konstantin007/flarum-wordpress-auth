<?php
namespace Arma\Auth\Wordpress\Server;

class WordpressEndPoints {

	/**
     * The WP temporary credentials end point.
     *
     * @var string
     */
	protected $temporaryCredentialsUri;

	/**
     * The WP authorization end point.
     *
     * @var string
     */
	protected $authorizationUri;

	/**
     * The WP token credentials end point.
     *
     * @var string
     */
	protected $tokenCredentialsUri;

	/**
     * The WP user details end point.
     *
     * @var string
     */
	protected $userDetailsUri;


	public function getTemporaryCredentialsUri() {
		return $this->temporaryCredentialsUri;
	}

	public function setTemporaryCredentialsUri($temporaryCredentialsUri) {
		$this->temporaryCredentialsUri = $temporaryCredentialsUri;
	}

	public function getAuthorizationUri() {
		return $this->authorizationUri;
	}

	public function setAuthorizationUri($authorizationUri) {
		$this->authorizationUri = $authorizationUri;
	}

	public function getTokenCredentialsUri() {
		return $this->tokenCredentialsUri;
	}

	public function setTokenCredentialsUri($tokenCredentialsUri) {
		$this->tokenCredentialsUri = $tokenCredentialsUri;
	}

	public function getUserDetailsUri() {
		return $this->userDetailsUri;
	}

	public function setUserDetailsUri($userDetailsUri) {
		$this->userDetailsUri = $userDetailsUri;
	}

}