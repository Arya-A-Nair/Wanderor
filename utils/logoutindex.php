<?php
 function logout(){
    echo "logout";
    session_destroy();
    header("Location: ./login");
}
?>