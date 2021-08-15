
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <form action="">

        <input placeholder="name" type="text" name="name">
        <a href="http://localhost:8000/index.php?name=name"><button type="submit" style="height :30px; background-color:blue;">Submit</button></a>
    </form>

    <?php 


       session_start();
       
                   if($_SESSION["name"]){
       
                       $name = $_SESSION["name"];
       
                       echo "Hello ".$name." !";
       
                   }else{

                     setcookie("name",$_GET["name"],time()+86400);
       
                       $_SESSION["name"] = $_COOKIE['name'];
       
                       $name = $_SESSION["name"];
           
                       if($name){
                       
                           echo "Hello ".$name." !";
           
                       }elseif(!$name){
           
                           echo "Hello platypus !";
           
                       }
       
       
                   }
                  
           ?>

</body>
</html>