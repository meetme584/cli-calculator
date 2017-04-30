<?php
// @Author : Prasad Oturkar
// @Simple CLI Calculator Class
// @Task 4: Compute Sum and Allow add method to accept delimeters ";"
// @How to run from console: php calculator.php add 1;11\\;\\3;5
error_reporting(E_ALL);

class CalculatorClass
{
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
        $paramArr = explode(',', $param);
        echo 'Sum is : '.array_sum($paramArr);
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