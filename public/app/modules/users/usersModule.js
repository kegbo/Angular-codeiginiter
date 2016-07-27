(function (app) {
  'use strict';

  app.registerModule('users');
  app.registerModule('task');
  app.registerModule('users.services');
  app.registerModule('users.routes', ['ui.router', 'users.services','task.routes']);
})(ApplicationConfiguration);
