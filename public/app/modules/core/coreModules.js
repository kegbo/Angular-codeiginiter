'use strict';

// Use Application configuration module to register a new module
ApplicationConfiguration.registerModule('core');
ApplicationConfiguration.registerModule('users');
ApplicationConfiguration.registerModule('core', ['ui.router','users.routes','ngStorage']);
