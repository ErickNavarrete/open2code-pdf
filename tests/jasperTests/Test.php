<?php

namespace Test\jasperTests;

use Open2code\Pdf\jasper\Report;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function itCanTestSomething()
    {
        $report = new Report(
            '',
            '',
            __DIR__.'/files/Example.jasper',
            __DIR__.'/files/Example.pdf'
        );
        $report->generateReport();
        $this->assertTrue(true);
    }
}