<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Add Item to Busket');

$I->amOnPage('/');
$I->click('Add Item');
$I->see('Add Item to Busket');

$I->selectOption('Product', '100.00');
$I->selectOption('Vat type', '0.14');
$I->fillField('Qty', '14');
$I->click('Add Item');

$I->amOnPage('/');
$I->see('Your Busket');
$I->see('Product Test');
$I->see('1,400.00');
$I->see('1,596.00');
