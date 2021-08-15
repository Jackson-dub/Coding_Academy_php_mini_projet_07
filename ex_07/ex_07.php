<?php

function modify_cookie(string $param1, mixed $param2){

    if(isset($_COOKIE[$param1])){

        setcookie($parm1,$param2,time()+86400);

    }

}