<?php 

function remove_cookie(string $param){

    if(isset($_COOKIE[$param])){

        unset($_COOKIE[$param]);

        setcookie($param,'',time() -3600,'/');

    }  

}
