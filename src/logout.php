<?php
    session_start();
    session_destroy();

    header('Refresh:0; url=http://localhost/schoolar/src/signin.html');
?>  