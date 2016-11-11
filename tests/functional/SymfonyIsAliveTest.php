<?php

class SymfonyIsAliveTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testIsSymfonyAlive()
    {
        /** @var Symfony\Component\DependencyInjection\Container */
        $kernel = $this->getModule('Symfony')->kernel;
        $this->assertInstanceOf('AppKernel', $kernel);
    }
}