import SettingsModal from 'flarum/components/SettingsModal';

export default class WordpressSettingsModal extends SettingsModal {
  className() {
    return 'WordpressSettingsModal Modal--small';
  }

  title() {
    return "Wordpress Settings";
  }

  form() {
    return [
      <div className="Form-group">
        <label>App Key</label>
        <input className="FormControl" bidi={this.setting('arma-auth-wordpress.app_key')}/>
      </div>,

      <div className="Form-group">
        <label>App Secret</label>
        <input className="FormControl" bidi={this.setting('arma-auth-wordpress.app_secret')}/>
      </div>
    ];
  }
}
