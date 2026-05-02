<?php
declare(strict_types=1);

use App\Controllers\ApogeoLuxController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/apogeo-lux', [ApogeoLuxController::class, 'index']);
$router->get('/contacto', [ContactController::class, 'index']);
$router->post('/contacto/enviar', [ContactController::class, 'send']);
$router->get('/contacto/gracias', [ContactController::class, 'thanks']);

return $router;
