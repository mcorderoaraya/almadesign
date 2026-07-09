<?php
declare(strict_types=1);

use App\Controllers\ApogeoLuxController;
use App\Controllers\ContentController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/consultoria-ia-procesos', [ContentController::class, 'consulting']);
$router->get('/gestion-documental', [ContentController::class, 'documentManagement']);
$router->get('/orquestacion-asistentes-ia', [ContentController::class, 'assistantOrchestration']);
$router->get('/software-factory', [ContentController::class, 'softwareFactory']);
$router->get('/apogeo', [ContentController::class, 'apogeo']);
$router->get('/ai-for-humans', [ContentController::class, 'aiForHumans']);
$router->get('/charlas-ai-for-humans', [ContentController::class, 'talksAiForHumans']);
$router->get('/apogeo-lux', [ApogeoLuxController::class, 'index']);
$router->get('/contacto', [ContactController::class, 'index']);
$router->get('/contacto/formulario', [ContactController::class, 'form']);
$router->get('/contacto/rag/iniciar', [ContactController::class, 'ragStart']);
$router->post('/contacto/rag/chat', [ContactController::class, 'ragChat']);
$router->post('/contacto/enviar', [ContactController::class, 'send']);
$router->get('/contacto/gracias', [ContactController::class, 'thanks']);

return $router;
