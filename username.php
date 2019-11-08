<?php
    session_start();
?>


<?php
    $_SESSION['user'] = $_POST['use'];
    echo $_SESSION['user'];
?>