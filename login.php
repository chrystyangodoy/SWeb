<?php

include './corp/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->template_dir = "smarty/SWeb_Login";
$smarty->compile_dir = "smarty/SWeb_Login_c";
$smarty->config_dir = "smarty/configs";
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('./SWeb_Login/index.html');