<?php

namespace Arma\Auth\Wordpress\Listener;

use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;

class AddClientAssets {

	public function subscribe(Dispatcher $events) {
		$events->listen(ConfigureClientView::class, [$this, "addAssets"]);
	}

	public function addAssets(ConfigureClientView $event) {
		if ($event->isForum()) {
			$event->addAssets([
				__DIR__.'/../../js/forum/dist/extension.js',
				__DIR__.'/../../less/forum/extension.less',
			]);
			$event->addBootstrapper('arma/auth-wordpress/main');
		}
		if ($event->isAdmin()) {
			$event->addAssets([
				__DIR__.'/../../js/admin/dist/extension.js'
			]);
			$event->addBootstrapper('arma/auth-wordpress/main');
		}
	}

}