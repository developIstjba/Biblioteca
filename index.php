<?php
require 'app/Core/Autoload.php';

use app\Core\App;
use app\Core\Autoload;
use app\Core\Configuracion;
use app\Core\Session;

date_default_timezone_set('America/Guayaquil');
setlocale(LC_TIME, 'es_EC.UTF-8','esp');

$load = new Autoload();

$app = new App($_GET['url'] ?? '');
$app->start();
            
?>