import app from 'flarum/app';

import WordpressSettingsModal from 'arma/auth-wordpress/components/WordpressSettingsModal';

app.initializers.add('arma-auth-wordpress', () => {
  app.extensionSettings['arma-auth-wordpress'] = () => app.modal.show(new WordpressSettingsModal());
});
