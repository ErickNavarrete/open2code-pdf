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
            [
                'Test' => 'test'
            ],
            '',
            __DIR__.'/files/Example.jasper',
            'xls',
            __DIR__.'/files/Example.xls'
        );
        $result = $report->generateReport();
        print_r($result['message']);
        $this->assertTrue(true);
    }
}