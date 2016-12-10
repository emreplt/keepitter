<?php
/*
 * autoloader
 */
require_once __DIR__ . '/vendor/autoload.php';

/*
 * load app
 */
require 'libs/app.php';

/*
 * require mvc
 */
require 'libs/model.php';
require 'libs/view.php';
require 'libs/controller.php';

/*
 * require helpers
 */
require 'libs/database.php';
require 'libs/session.php';

/*
 * require configs
 */
require 'config/paths.php';
require 'config/twitter.php';

$appim = new app();
 ?>
