<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Get Busket Content as JSON');
$I->sendGET('/busket');
$I->seeResponseIsJson();
