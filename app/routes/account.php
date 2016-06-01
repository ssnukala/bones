<?php
    
    use Cartalyst\Sentinel\Native\Facades\Sentinel;

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Database\Schema\Blueprint;

    use \Psr\Http\Message\ResponseInterface as Response;
    use \Psr\Http\Message\ServerRequestInterface as Request;
    
    use UserFrosting\Fortress\RequestSchema;
    use UserFrosting\Fortress\Adapter\JqueryValidationAdapter;

    global $app;

    // Environment check middleware
    $checkEnvironment = $app->getContainer()['checkEnvironment'];
    
    $app->group('/account', function () use ($checkEnvironment) {
        $this->get('/register', function (Request $request, Response $response, $args) {
            
            // Load validation rules
            $locator = $this->locator;
            $schema = new RequestSchema("schema://forms/register.json");
            $validator = new JqueryValidationAdapter($schema, $this->translator);
            
            return $this->view->render($response, 'pages/account/register.html.twig', [
                "page" => [
                    "validators" => $validator->rules()
                ]
            ]);     
        })->add($checkEnvironment);
        
        
        $this->post('/register', function (Request $request, Response $response, $args) {            
            // Register a new user
            Sentinel::register([
                'email'    => 'test@example.com',
                'password' => 'foobar',
            ]);
        });
    });
    