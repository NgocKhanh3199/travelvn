<?php
    session_start();
    unset($_SESSION['idcompany']);
    session_destroy();
    header("Location:index.php?controller=chome&action=company");
?>