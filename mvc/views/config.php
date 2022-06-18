
<?php
    if(session_status() != 2){
        session_start();
    }

    if(!isset($_SESSION['position'])){
        header("Location:dangky.php");
    }

    else{
        if($_SESSION['position'] == 0){
            header("Location:index.php?controller=chome&action=home&iduser=".$_SESSION['iduser']);
        }
        else if($_SESSION['position'] == 1){
            header("Location:index.php?controller=chome&action=admin&iduser=".$_SESSION['iduser']);
        }
        else if($_SESSION['position'] == 2){
            header("Location:index.php?controller=chome&action=company&idcompany=".$_SESSION['idcompany']);
        }
    }
    // else if($_SESSION['position'] == 2){
    //     header("Location:index.php?controller=chome&action=company&iduser=".$_SESSION['iduser']);
    // }
?>