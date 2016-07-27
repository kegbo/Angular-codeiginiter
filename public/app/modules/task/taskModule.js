(function (app) {
  'use strict';

  app.registerModule('task');
  app.registerModule('task.services');
  app.registerModule('task.routes', ['ui.router', 'task.services']);
})(ApplicationConfiguration);
