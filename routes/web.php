<?php
declare(strict_types=1);

use App\Controllers\ApogeoLuxController;
use App\Controllers\AdminController;
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
$router->get('/politica-almadesign', [ContentController::class, 'policy']);
$router->get('/apogeo-lux', [ApogeoLuxController::class, 'index']);
$router->get('/contacto', [ContactController::class, 'index']);
$router->get('/contacto/formulario', [ContactController::class, 'form']);
$router->get('/contacto/rag/iniciar', [ContactController::class, 'ragStart']);
$router->post('/contacto/rag/chat', [ContactController::class, 'ragChat']);
$router->post('/contacto/enviar', [ContactController::class, 'send']);
$router->get('/contacto/gracias', [ContactController::class, 'thanks']);

$router->get('/dashboard/login', [AdminController::class, 'login']);
$router->post('/dashboard/login', [AdminController::class, 'authenticate']);
$router->get('/dashboard/2fa', [AdminController::class, 'twoFactor']);
$router->post('/dashboard/2fa', [AdminController::class, 'verifyTwoFactor']);
$router->post('/dashboard/logout', [AdminController::class, 'logout']);
$router->get('/dashboard', [AdminController::class, 'index']);
$router->get('/dashboard/pages', [AdminController::class, 'pages']);
$router->get('/dashboard/pages/edit', [AdminController::class, 'editPage']);
$router->post('/dashboard/pages/save', [AdminController::class, 'savePage']);
$router->post('/dashboard/pages/delete', [AdminController::class, 'deletePage']);
$router->get('/dashboard/sections/edit', [AdminController::class, 'editSection']);
$router->post('/dashboard/sections/save', [AdminController::class, 'saveSection']);
$router->post('/dashboard/sections/delete', [AdminController::class, 'deleteSection']);
$router->get('/dashboard/rag-markdown', [AdminController::class, 'ragMarkdown']);
$router->post('/dashboard/rag-markdown/save', [AdminController::class, 'saveRagMarkdown']);

return $router;
