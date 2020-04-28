<?php
function ForceLogin() {
    if(isset($_SESSION['id'])){
        
    }else{
        header("Location: /login.php"); exit;
    }
}
?>