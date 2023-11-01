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
                'Test' => 'test',
                "reverse" => "<p>asdfasdfasdfas</p><p></p><p>asd</p><p>f</p><p>as</p><p>dfas</p><p>df</p><p>asdfasdfasdf</p><p>asdfasdf</p><p>asd</p><p>fas</p><p>df</p><p>asdf</p><p>asdfa</p>"
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