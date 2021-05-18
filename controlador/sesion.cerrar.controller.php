<?php

session_name("oelt_v2");
session_start();

unset($_SESSION["s_nombre"]);
unset($_SESSION["s_apellidos"]);
unset($_SESSION["s_usuario"]);

session_destroy();

header("location:../vista/login.php");
