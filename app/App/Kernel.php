<?php
declare(strict_types=1);

namespace App\App;

use Almadesign\Backend\Http\Request;
use Almadesign\Backend\Http\Response;
use Almadesign\Backend\Routing\Router;
use Almadesign\Backend\Routing\RouteCollection;

final class Kernel
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
        RouteCollection::register($this->router);
    }

    public function handle(Request $request): Response
    {
        return $this->router->dispatch($request);
    }
}
