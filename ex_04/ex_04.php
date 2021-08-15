
<?php 

function remove_session($_SESSION){

    if(isset($_SESSION)){

        for($i = 0; $i<count($_SESSION); $i++ ){

            unset($_SESSION[$i]);

        }

    }

    session_destroy();

    session_reset();

}

?>


