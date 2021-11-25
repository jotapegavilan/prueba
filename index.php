<?php
require_once("config.php");
require_once("controlador/index.php");
if (isset($_REQUEST['m'])) :
    if (method_exists("modeloController", $_REQUEST['m'])) :
        modeloController::{$_REQUEST['m']}();
    endif;
else :
    modeloController::index();
endif;
