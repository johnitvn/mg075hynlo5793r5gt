<?php //

use tests\codeception\backend\FunctionalTester;
use tests\codeception\backend\_pages\LoginPage;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure login page works');

