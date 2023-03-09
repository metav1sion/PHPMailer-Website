<?php
    session_start();
    session_destroy(); //sessionu durdur
    setcookie("kullanici","",time()-1);//tanımlanan cookie silinir.
    echo "<script> window.location.href='index.php'; </script>";
?>