<?php
    define("ITEMS", 6);
    $cust_name = $table_num = "";
    $food = $drinks = array();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $cust_name = test_input($_POST["cname"]);
        $table_num = test_input($_POST["ctable"]);
        for($x=0;$x<ITEMS;++$x){
            $food[$x] = $_POST['funit'];
        }
    }
    else
        echo $_SERVER["REQUEST_METHOD"]." fail";

    function Cust_Info(){
        global $cust_name, $table_num, $testing;
        if(isset($cust_name) && isset($table_num)){
            echo "Customer : ".$cust_name."<br>";
            echo "Table No : ".$table_num."<br>";
        }
        else
            echo "Failing to retrieve data";
    }

    function Cust_Order(){
        global $food;
        if(isset($food)){
            echo "<ol>";
            foreach($food as $key => $value)
                echo "<li>".$key." - ".$value."</li>";
            echo "</ol>";
        }
        else
            echo "fail...";
        
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dsiplaying Receipt</title>
    </head>
    <body>
        <p>
            <?php Cust_Info() ?>
            <?php Cust_Order() ?>
        </p>
    </body>
</html>
<!--
function testArray()
    {
        if(isset($fnames))
        {
            echo "<ol>";
            foreach($fnames as $fn)
                echo "<li>".$fn."</li>";
            echo "</ol>";
        }
        else
            echo "fail...";
    }
        $fnames = ['chick_teri', 'wagyu_teri', 'unagi_teri', 'chick_don', 'yaki_don', 'unagi_don'];
    $fprices = array( 'chick_teri'=>10.90, 'wagyu_teri'=>14.90, 'unagi_teri'=>13.90, 
                    'chick_don'=>7.90, 'yaki_don'=>8.90, 'unagi_don'=>9.90);
    $dnames = ['sky_juice', 'apple_juice', 'carrot_juice', 'melon_juice', 'lime_juice'];
    $dprices = ['sky_juice'=>1.00, 'apple_juice'=>4.80, 'carrot_juice'=>4.80, 
                'melon_juice'=>4.80, 'lime_juice'=>4.80]; 
-->