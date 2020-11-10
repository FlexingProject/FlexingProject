<?php

session_start();
unset($_SESSION["LOG"]);
header("Location: /flexing/index.php");