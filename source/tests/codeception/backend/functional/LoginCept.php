<?php

//

use tests\codeception\backend\FunctionalTester;
use tests\codeception\backend\_pages\LoginPage;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure login page works');

$loginPage = LoginPage::openBy($I);

$I->canSee("Remember Me");
$I->canSeeLink("Forgot password?", '/password/forgot');

$I->amGoingTo('submit login form with no data');
$loginPage->login('', '');
$I->expectTo('see validations errors');
$I->see('Username cannot be blank.', '.help-block');
$I->see('Password cannot be blank.', '.help-block');

$I->amGoingTo('try to login with wrong credentials');
$I->expectTo('see validations errors');
$loginPage->login('admin', 'wrong');
$I->expectTo('see validations errors');
$I->see('Incorrect username or password.', '.help-block');

$I->amGoingTo('try to login with correct credentials');
$loginPage->login('demo1', 'demo1');
$I->expectTo('see that user is logged');

$I->amOnPage(['/site/index']);

$I->amGoingTo('try to logout');
$I->click('//*[@id="page-wrapper"]/div[1]/nav/ul/li/a');
$I->amOnPage(['/site/in']);

