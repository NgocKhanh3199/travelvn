<?php
    session_start();
    unset($_SESSION['iduser']);
    session_destroy();
    header("Location:index.php");
?>