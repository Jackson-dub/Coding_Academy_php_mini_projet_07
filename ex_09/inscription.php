<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


<?php



if(isset($_POST['submit'])){

if(isset($_POST["name"])){

  if(!empty($_POST["name"]) && (strlen($_POST["name"]) >= 3 && strlen($_POST["name"] <= 10))){

    $name = $_POST["name"];

  }else{

       $error_name = "Invalid name";


  }

}

if(isset($_POST["email"])){

  if(!empty($_POST["email"]) && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)==true){

      $email = $_POST["email"];

  }else{

   $error_email = "Invalid email";  

}

}


if(isset($_POST["password"]) && isset($_POST["password_confirmation"])){

  if(!empty($_POST["password"]) && strlen($_POST["password"]) >= 3 && strlen($_POST["password"]) <= 10){

    $sentPassword = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $password_confirmation = password_verify($_POST["password_confirmation"],$sentPassword);

    if($password_confirmation){

     
      $password = $sentPassword;
     
     
    }elseif($password === $password_confirmation){

      $error_pass = "Invalid password or confirmation";
  }

  }else{

    $error_pass = "Invalid password or confirmation";
}

}

$success == false;

if($password && $email && $name){

    $data = [];
    $data["name"] = $name;
    $data["email"]=$email;
    $data["password"]=$password;
    $data["created_at"] = date("Y-m-d");

    $collection = file_get_contents('inscriptions.json');
    $Data = json_decode($collection);

    
    $search = $data["email"];
    $dataCollection = (array)$Data;

    $check = array_column($dataCollection,$search);

    $Bigdata = [];

    if((count($check) == "")){

      $data = array($data["email"]=>$data);

      $Bigdata = array_merge($Bigdata,$data);

       //print_r($Bigdata);

      $json = file_get_contents('inscriptions.json');

      $json = json_decode($json,true);
  
  
      $json[] = $Bigdata;

      
      $json = json_encode($json);
  
      file_put_contents('inscriptions.json',$json);

      $success = true;


    }else{

      echo "Cet email est déjà associer à un compte.";
      $success = false;
    
    }

}

}

?>

<form method="POST" class="mb-3 row">

    <?php if($success == true){echo "<div>User created</div><br>";}?>
    <div class="col-sm-10">
    <?php if(isset($error_name)){echo $error_name."<br>";}?>
      <input type="text" name="name" placeholder="name" >
    </div>
    <div class="col-sm-10">
    <?php if(isset($error_email)){echo $error_email."<br>"; }?>
      <input type="text" name="email" placeholder="email" >
    </div>
    
  <div class="mb-3 row">
  <?php if(isset($error_pass)){echo "<div>".$error_pass."</div><br>";}?>
    <div class="col-sm-10">
      <input type="password"  name="password" placeholder="enter password">
    </div>
    <div class="col-sm-10">
      <input type="password"  name="password_confirmation" placeholder="verify your password">
    </div>
    </div>
   <button type="submit" name='submit' style="width:200px; background-color:blue;">Submit</button>
  </form>


</body>
</html>