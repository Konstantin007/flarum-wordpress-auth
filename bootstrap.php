<?php

use Arma\Auth\Wordpress\Listener;
use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
	$events->subscribe(Listener\AddClientAssets::class);
	$events->subscribe(Listener\AddWordpressAuthRoute::class);
};
