<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

  

        if(isset($_GET["submit"])){

                if(isset($_GET["background"])){

                    $color = strtolower($_GET["background"]);


                if( $color == "white" || $color == "black" || $color == "red" || $color == "blue" || empty($color)){

                        header('Location:show_color.php',true,302);

                        exit;

                }elseif($color !== "white" || $color !== "black" || $color !== "red" || $color !== "blue" || empty($color)){

                        $error_color = "Invalid color";

                }

        }

    }

    ?>
    
     <?php if(isset($error_color)){

            echo $error_color;

        }?>

    <form  method="GET" action="show_color.php">
   
    <input type="text" name="background">
    <button style="background-color:blue; height:20px;"type="submit" name="submit">Submit</button>
    </form>


</body>
</html>