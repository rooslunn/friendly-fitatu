<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Get Busket Content as JSON');
$I->sendGET('/api/busket/1');
$I->seeResponseIsJson();

