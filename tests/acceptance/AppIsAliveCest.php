<?php


class AppIsAliveCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function isAppAliveTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Your application is now ready');
    }
}
