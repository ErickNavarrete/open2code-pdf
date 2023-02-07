<?php

use Open2code\Pdf\module\Report;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function itCanTestSomething(){
        $report = new Report('','','','');
        $report->generateReport();
        $this->assertTrue(true);
    }
}