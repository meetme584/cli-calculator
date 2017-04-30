<?php
// @Author : Prasad Oturkar
// @Simple CLI Calculator Class
// @Task 5: Compute Sum and Show error message if negative parameters are passed.
// @How to run from console: php calculator.php add 1,5,-8
error_reporting(E_ALL);

class CalculatorClass
{
    public $negArr;
    public $paramArr;
    public $explodeString;
    public function __construct()
    {
        $this->negArr = array();
        $this->paramArr = array();
        $this->explodeString = array();
    }

    /*
      Function to handle new line character and string seperator delimeters
    */
    public function replaceNewLineAndDelimiter($param)
    {
        $param = str_replace('\\n', ',', $param);
        $param = str_replace('\\', '', $param);
        $param = str_replace('@', ',', $param);
        $param = str_replace('!', ',', $param);
        $param = str_replace('#', ',', $param);
        $param = str_replace('$', ',', $param);
        $param = str_replace('%', ',', $param);
        $param = str_replace(';', ',', $param);
        $param = str_replace('^', ',', $param);
        $param = str_replace('&', ',', $param);
        $param = str_replace('*', ',', $param);
        $param = str_replace('+', ',', $param);
        $param = str_replace('_', ',', $param);
        $param = str_replace('{', ',', $param);
        $param = str_replace('}', ',', $param);
        $param = str_replace('~', ',', $param);
        $param = str_replace('(', ',', $param);
        $param = str_replace(')', ',', $param);
        $param = str_replace('[', ',', $param);
        $param = str_replace(']', ',', $param);
        $param = str_replace('<', ',', $param);
        $param = str_replace('>', ',', $param);
        $param = str_replace('.', ',', $param);
        $param = str_replace('/', ',', $param);

        return $param;
    }

    /*
      Function to compute Sum
    */
    public function sum($param)
    {
        if ($param == '0') {
            echo 'Sum is  : '.$param;
            die;
        }

        $param = $this->replaceNewLineAndDelimiter($param);

        $isNegative = $this->checkNegative($param);
        if (!$isNegative) {
            $this->paramArr = explode(',', $param);
            echo 'Sum is : '.array_sum($this->paramArr);
        } else {
            echo 'Error: Negative numbers not allowed';
            die;
        }
    }

    public function checkNegative($str)
    {
        $this->explodeString = explode(',', $str);
        foreach ($this->explodeString as $val) {
            if ($val < 0) {
                $this->negArr[] = $val;
            }
        }

        if (sizeof($this->negArr) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

// Only run this when executed on the commandline
if (php_sapi_name() == 'cli') {
    unset($argv[0]);
    $obj = new CalculatorClass();
    // now logic goes here ..
    if (isset($argv[2]) && $argv[2] != '') {
        $params = $argv[2];
    } else {
        $params = 0;
    }
    switch ($argv[1]) {
        case 'sum':
        case 'add':
            echo $obj->sum($params);
            break;
        default:
            echo 'Unknown command!';
            break;
    }
}
?>