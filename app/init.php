<?php
//load config
require_once 'config/config.php';
//Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/Email.php';
require_once 'helpers/TimeConvert_Helper.php';
require_once 'helpers/imageUpload_Helper.php';


//autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

