<?php

namespace Open2code\Pdf\module;

class Report
{
    private $jarPath = '/src/storage/jasperJar/JasperReportGenerator.jar';
    public $data;
    public $jasperPath;
    public $parameters;
    public $output;

    public function __construct($data, $jasperPath, $parameters, $output){
        $this->data = $data;
        $this->jasperPath = $jasperPath;
        $this->parameters = $parameters;
        $this->output = $output;
    }

    public function generateReport(){
        $this->data = json_encode($this->data, JSON_UNESCAPED_UNICODE);
        $this->jarPath = getcwd() . $this->jarPath;


//        $this->parameters = $this->stringParameters($this->parameters);

        $arguments = "$this->jasperPath \"".addslashes($this->data)
            ."\" --output=$this->output --parameters=\"$this->parameters\" --format=pdf";

        $command = "java -Dfile.encoding=UTF-8 -jar $this->jarPath $arguments";

        print_r($command);
        $exec = exec($command, $execO, $execR);
    }

    private function stringParameters($parameters): string
    {
        $string = '';
        foreach ($parameters as $key => $value) {
            $string .= "$key=$value,";
        }

        return trim($string);
    }
}