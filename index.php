<?php

    session_start();

    // Model
    require_once './model/ModelA.inc.php';
    require_once './model/ModelSunshine.inc.php';
    // View
    require_once './view/ViewFrontpage.inc.php';
    require_once './view/ViewAbout.inc.php';
    //Controller
    require_once './controller/Controller.inc.php';

    // Start controller
    $controller = new Controller($_GET);
    $controller->ignite();

?>
