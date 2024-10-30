<?php

session_start();

define("MAIN_PATH", (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);

define("URL", "http://localhost/ZenBlog/");


require_once 'db.php';
require_once 'functions.php';
require_once 'session.php';
require_once 'validations.php';
