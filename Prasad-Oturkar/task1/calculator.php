<?php
# @Author : Prasad Oturkar
# @Simple CLI Calculator Class
# @Task 1: To Compute Sum
# @How to run from console: php calculator.php sum 1,11
error_reporting(E_ALL);

class CalculatorClass
{
	/*
	  Function to compute Sum
	*/
    public function sum($param)
    {
        if ($param == '0') {
            echo "Sum is  : ".$param;
            die;
        }
        $paramArr = explode(",", $param);
        echo "Sum is : ".array_sum($paramArr);
    }
}
// Only run this when executed on the commandline
if (php_sapi_name() == 'cli') {
    unset($argv[0]);
    $obj = new CalculatorClass();
    // now logic goes here ..
    if (isset($argv[2]) && $argv[2]!='') {
        $params = $argv[2];
    } else {
        $params=0;
    }
    switch ($argv[1]) {
        case "sum":
            echo $obj->sum($params);
            break;
        default:
            echo "Unknown command!";
            break;
    }
}
?>