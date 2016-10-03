'use strict';

System.register('arma/auth-wordpress/components/WordpressSettingsModal', ['flarum/components/SettingsModal'], function (_export, _context) {
  "use strict";

  var SettingsModal, WordpressSettingsModal;
  return {
    setters: [function (_flarumComponentsSettingsModal) {
      SettingsModal = _flarumComponentsSettingsModal.default;
    }],
    execute: function () {
      WordpressSettingsModal = function (_SettingsModal) {
        babelHelpers.inherits(WordpressSettingsModal, _SettingsModal);

        function WordpressSettingsModal() {
          babelHelpers.classCallCheck(this, WordpressSettingsModal);
          return babelHelpers.possibleConstructorReturn(this, (WordpressSettingsModal.__proto__ || Object.getPrototypeOf(WordpressSettingsModal)).apply(this, arguments));
        }

        babelHelpers.createClass(WordpressSettingsModal, [{
          key: 'className',
          value: function className() {
            return 'WordpressSettingsModal Modal--small';
          }
        }, {
          key: 'title',
          value: function title() {
            return "Wordpress Settings";
          }
        }, {
          key: 'form',
          value: function form() {
            return [m(
              'div',
              { className: 'Form-group' },
              m(
                'label',
                null,
                'App Key'
              ),
              m('input', { className: 'FormControl', bidi: this.setting('arma-auth-wordpress.app_key') })
            ), m(
              'div',
              { className: 'Form-group' },
              m(
                'label',
                null,
                'App Secret'
              ),
              m('input', { className: 'FormControl', bidi: this.setting('arma-auth-wordpress.app_secret') })
            )];
          }
        }]);
        return WordpressSettingsModal;
      }(SettingsModal);

      _export('default', WordpressSettingsModal);
    }
  };
});;
'use strict';

System.register('arma/auth-wordpress/main', ['flarum/app', 'arma/auth-wordpress/components/WordpressSettingsModal'], function (_export, _context) {
  "use strict";

  var app, WordpressSettingsModal;
  return {
    setters: [function (_flarumApp) {
      app = _flarumApp.default;
    }, function (_armaAuthWordpressComponentsWordpressSettingsModal) {
      WordpressSettingsModal = _armaAuthWordpressComponentsWordpressSettingsModal.default;
    }],
    execute: function () {

      app.initializers.add('arma-auth-wordpress', function () {
        app.extensionSettings['arma-auth-wordpress'] = function () {
          return app.modal.show(new WordpressSettingsModal());
        };
      });
    }
  };
});