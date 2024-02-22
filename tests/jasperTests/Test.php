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
            __DIR__.'/files/test.json',
            '',
            __DIR__.'/files/Example.jasper',
            __DIR__.'/files/Example.rtf',
            'rtf'
        );
        $result = $report->generateReport();
        print_r($result['message']);
        $this->assertTrue(true);
    }
}