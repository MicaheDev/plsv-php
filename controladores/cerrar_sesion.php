<?php

session_start();
session_destroy();
header("Location: /plsv/vistas/login.php");
exit()

?>