<?php
session_cache_limiter(false);
session_start();

define('HASH', 'site_session');
define('YII_APP_BASE_PATH', dirname(__DIR__));
define('YII_APP_TEST_PATH', YII_APP_BASE_PATH . '/tests');
define('RP', __DIR__ . '/webception');

include_once RP . '/functions/helpers.php';
require(YII_APP_BASE_PATH . '/vendor/autoload.php');


$app = new \Slim\Slim([
    'webception' => [
        'version' => '0.1.0',
        'name' => '<strong>Test Runner Tool<strong>',
        'repo' => '#',
        'config' => RP . '/config.php',
        'test' => RP . 'App/Tests/_config/codeception_%s.php',
    ],
    'templates.path' => RP . '/templates',
        ]);

$config = get_webception_config($app);


foreach (glob(RP . '/routes/*.route.php') as $route) {
    require_once($route);
}

foreach (glob(RP . '/libraries/*.class.php') as $class) {
    require_once($class);
}


$app->container->singleton('site', function () use ($app, $config) {
    $hash_in_querystring = $app->request()->get('hash');
    $hash = FALSE;
    if (!is_null($hash_in_querystring) && $hash_in_querystring !== FALSE)
        $hash = $hash_in_querystring;
    elseif (isset($_SESSION[HASH]))
        $hash = $_SESSION[HASH];
    $site = new webception\libraries\Site($config['sites']);
    $site->set($hash);
    $_SESSION[HASH] = $site->getHash();
    return $site;
});

$app->container->singleton('codeception', function () use ($config, $app) {
    return new webception\libraries\Codeception($config, $app->site);
});

$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath(RP . 'App/Templates/_cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

$app->error(function (\Exception $e) use ($app) {
    $app->render('error.php');
});

$app->run();
