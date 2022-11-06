<?php
const ROOT_DIR = __DIR__;

require_once ROOT_DIR . '/vendor/autoload.php';

if (!session_id()){
    session_start();
}

require_once ROOT_DIR . '/config/constants.php';

if (!session_id()) {
    session_start();
}
require_once CONFIG_DIR . '/DB.php';
require_once APP_DIR . '/index.php';


if (!empty($_POST)) {

    require_once APP_DIR . '/form_scripts/controller.php';

} else {


    require_once PARTS_DIR . '/header.php';

    require_once CONFIG_DIR . '/router.php';

    require_once PARTS_DIR . '/footer.php';
}
