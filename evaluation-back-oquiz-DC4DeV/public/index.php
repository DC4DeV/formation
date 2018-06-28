<?php
require __DIR__.'/../vendor/autoload.php';
session_start();
use Oquiz\Application;
$app = new Application();
$app->run();
