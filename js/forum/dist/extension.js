System.register('arma/auth-wordpress/main', ['flarum/extend', 'flarum/components/HeaderSecondary', 'flarum/components/LogInButtons'], function (_export) {
  'use strict';

  var extend, HeaderSecondary, LogInButtons;
  return {
    setters: [function (_flarumExtend) {
      extend = _flarumExtend.extend;
    }, function (_flarumComponentsHeaderSecondary) {
      HeaderSecondary = _flarumComponentsHeaderSecondary['default'];
    }, function (_flarumComponentsLogInButtons) {
      LogInButtons = _flarumComponentsLogInButtons['default'];
    }],
    execute: function () {

      app.initializers.add('arma-auth-wordpress', function () {
        extend(LogInButtons.prototype, 'items', function (items) {
          items.add('foo', m(
            'a',
            { href: '#' },
            'fsdasdasdoo'
          ), -100);
        });
      });
    }
  };
});