<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    global $app;

    // Front page
    $app->get('/', function (Request $request, Response $response, $args) {
        $config = $this->get('config');
        
        return $this->view->render($response, 'pages/index.html.twig');
    });

    // About page
    $app->get('/about', function (Request $request, Response $response, $args) {
        return $this->view->render($response, 'pages/about.html.twig');     
    });      
    
    // Flash alert stream
    $app->get('/alerts', function (Request $request, Response $response, $args) {
        return $response->withJson($this->get('alerts')->getAndClearMessages());
    });

    // End a session
    $app->get('/logout', function (Request $request, Response $response, $args) {
        $config = $this->get('config');
        session_destroy();
        return $response->withStatus(302)->withHeader('Location', $config['site.uri.public']);
    });
    
    