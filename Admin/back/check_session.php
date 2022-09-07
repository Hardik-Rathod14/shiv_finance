<?php
    session_start();
    if(isset($_SESSION['branch']))
    {
        echo '0';
    }
    else
    {
        echo '1';
    }
?>