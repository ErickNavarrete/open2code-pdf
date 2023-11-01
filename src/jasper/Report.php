<?php

namespace Open2code\Pdf\jasper;

class Report
{
    private $jarPath = '/jar/JasperReportGenerator.jar';
    public $data;
    public $parameters;
    public $output;
    public $jasperPath;
    public $documentType;

    public function __construct($data, $parameters, $jasperPath, $documentType, $output)
    {
        $this->data = $data;
        $this->parameters = $parameters;
        $this->jasperPath = $jasperPath;
        $this->output = $output;
        $this->documentType = $documentType;
    }

    /**
     * @return array
     */
    public function generateReport(): array
    {
        $this->data = json_encode($this->data, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS);

        $this->jarPath = __DIR__.$this->jarPath;
        $this->parameters = $this->toString($this->parameters);

        $arguments = "$this->jasperPath \"".addslashes($this->data)
            ."\" --output=$this->output --parameters=\"$this->parameters\" --format=" . $this->documentType;

        $command = "java -Dfile.encoding=UTF-8 -jar $this->jarPath $arguments";
        $exec = exec($command, $execO, $execR);

        if (is_numeric(strpos(strtolower($exec), 'done'))) {
            return [
                'success' => 1,
                'message' => '',
            ];
        } else {
            return [
                'success' => 0,
                'message' => " => output: ".print_r($exec, true)." => result: "
                    .$execR
                    ." =>arguments: ".$arguments,
            ];
        }
    }

    private function toString($parameters): string
    {
        $string = '';

        if (!empty($parameters)) {
            foreach ($parameters as $key => $value) {
                $string .= "$key=$value,";
            }
        }

        return trim($string);
    }
}