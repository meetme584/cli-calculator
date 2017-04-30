<?php
# @Author : Prasad Oturkar
# @Simple CLI Calculator Class
# @Task 3: Compute Sum and Allow add method to accept new line character
# @How to run from console: php calculator.php add 1,11\n3,5
error_reporting(E_ALL);

class CalculatorClass
{
    /*
      Function to compute Sum
    */
    public function sum($param)
    {
        if ($param == '0') {
            echo "Sum is : ".$param;
            die;
        }
        $param = str_replace("\\n", ",", $param);  // handle new line character here
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
        case "add":
            echo $obj->sum($params);
            break;
        default:
            echo "Unknown command!";
            break;
    }
}
?>