<?php

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Database\Schema\Blueprint;

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    global $app;

    // Environment check middleware
    $checkEnvironment = $app->getContainer()['checkEnvironment'];
    
    $app->group('/account', function () use ($checkEnvironment) {
        $this->get('/register', function (Request $request, Response $response, $args) {
            return $this->view->render($response, 'pages/account/register.html.twig');     
        })->add($checkEnvironment);
        
        
        $this->post('/register', function (Request $request, Response $response, $args) {
            sleep(3);
        });
    });
    