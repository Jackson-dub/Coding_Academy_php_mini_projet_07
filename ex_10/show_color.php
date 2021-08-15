<?php 

$color = $_GET["background"];

if(!empty($color) && ($color == "blue" || $color == "red" || $color == "white" || $color == "black")){

    setcookie("background-color",$color,time()+30);

}else{

    header('Location:set_color.php',true,302);

    die;
}

if(isset($_COOKIE["background-color"])){

        $BGC = $_COOKIE["background-color"];

}else{

    header('Location:set_color.php',true,302);

    die;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="<?php echo 'background-color:'.$BGC ?>">
    


</body>
</html>