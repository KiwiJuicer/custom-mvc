<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Custom application
include __DIR__ . '/../Mvc/Application.php';

// Composer autoloading
include __DIR__ . '/../vendor/autoload.php';

// Retrieve configuration
$appConfig = require __DIR__ . '/../config/application.config.php';

// Run the application!
\Mvc\Application::init($appConfig)->run();