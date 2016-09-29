System.register('arma/auth-wordpress/main', ['flarum/extend', 'flarum/components/LogInButtons', 'flarum/components/LogInButton'], function (_export) {
   'use strict';

   var extend, LogInButtons, LogInButton;
   return {
      setters: [function (_flarumExtend) {
         extend = _flarumExtend.extend;
      }, function (_flarumComponentsLogInButtons) {
         LogInButtons = _flarumComponentsLogInButtons['default'];
      }, function (_flarumComponentsLogInButton) {
         LogInButton = _flarumComponentsLogInButton['default'];
      }],
      execute: function () {

         app.initializers.add('arma-auth-wordpress', function () {
            extend(LogInButtons.prototype, 'items', function (items) {
               items.add('wordpress', m(
                  LogInButton,
                  {
                     className: 'Button LogInButton--wordpress',
                     icon: 'wordpress',
                     path: '/auth/wordpress' },
                  'Log In with WP Site'
               ));
            });
         });
      }
   };
});