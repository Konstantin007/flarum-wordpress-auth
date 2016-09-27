<?php

use Arma\Auth\Wordpress\Listener;
use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
	$events->subscribe(Listener\AddClientAssets::class);
	/*$events->listen(ConfigureClientView::class, function(ConfigureClientView $event) {
		if ($event->isForum()) {
			$event->addAssets(__DIR__.'/js/forum/dist/extension.js');
			$event->addBootstrapper('arma/auth-wordpress/main');
		}
	});*/
};
