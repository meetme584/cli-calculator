<?php
// @Author : Prasad Oturkar
// @Simple CLI Calculator Class
// @Task 7: Compute Sum and ignore parameters in sum above 1000
// @How to run from console: php calculator.php add 100,200,2000
error_reporting(E_ALL);

class CalculatorClass
{
    public $lesserArray;
    public $greaterArray;
    public $paramArr;
    public $explodeString;
    public $commaSeparated;

    public function __construct()
    {
        $this->lesserArray = array();
        $this->greaterArray = array();
        $this->paramArr = array();
        $this->explodeString = array();
        $this->commaSeparated = '';
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
    Function to check if the number is negative or not
    */
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

    /*
     Function to Compute Sum
    */
    public function sum($param)
    {
        if ($param == '0') {
            echo 'Sum is  : '.$param;
            die;
        }

        $param = $this->replaceNewLineAndDelimiter($param);
        $isNegative = $this->checkNegative($param);
        if ($isNegative) {
            $this->commaSeparated = implode(',', $this->negArr);
            echo 'Error: Negative numbers ('.$this->commaSeparated.') not allowed';
            die;
        }

        $isValid = $this->checkNumbers($param);

        if (!$isValid) {
            //$this->paramArr = explode(",",$param);
            echo 'Sum is : '.array_sum($this->greaterArray);
        } else {
            echo 'Sum is : '.array_sum($this->lesserArray);
        }
    }

    /*
    Function to check if number is above 1000 or not
    */
    public function checkNumbers($str)
    {
        $this->explodeString = explode(',', $str);

        foreach ($this->explodeString as $val) {
            if ($val < 1001) {
                $this->lesserArray[] = $val;
            } else {
                $this->greaterArray[] = 0;
            }
        }
        if (sizeof($this->lesserArray) > 0) {
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