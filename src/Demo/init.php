<?php

include dirname(__DIR__) . '/Lib/Autoloader.php';
use Wosh\Config\XpyConfig;

$clientId = '';                  //应用用户名，注册邮箱
$clientSecret = '';             //应用密钥


$config = new XpyConfig($clientId, $clientSecret);
