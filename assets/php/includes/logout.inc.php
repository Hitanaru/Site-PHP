<?php
session_start();
session_unset(); // Delete les variables de session_start();
session_destroy();
header("Location: ../../../loginsystem.php");