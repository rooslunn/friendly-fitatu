<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('List Busket Items');
$I->amOnPage('/');
$I->see('Your Busket Is Here');
$I->canSeeLink('Add Item');

