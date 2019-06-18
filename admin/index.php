<?php
    include('config/parameters.php');
    include('../config/defines.php');
    include('../config/parameters.php');
    include('../autoloader.php');

    $_controller = $_GET['controller'];
    $action = $_GET['action'];

    include('theme/templates/layoute.html.php');
