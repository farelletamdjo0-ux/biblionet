<?php
class Router
{
    private array $routes = [
        ''          => 'CatalogueController',
        'catalogue' => 'CatalogueController',
        'auth'      => 'AuthController',
        'livres'    => 'LivreController',
        'adherents' => 'AdherentController',
        'emprunts'  => 'EmpruntController',
    ];

    // URL : /controleur/action/param1/param2 (action par défaut : index)
    public function dispatch(string $url): void
    {
        $parts  = array_values(array_filter(explode('/', trim($url, '/')), 'strlen'));
        $route  = $parts[0] ?? '';
        $action = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        if (!isset($this->routes[$route])) {
            $this->notFound();
            return;
        }

        $class = $this->routes[$route];
        $controller = new $class();

        if (str_starts_with($action, '__') || !is_callable([$controller, $action])) {
            $this->notFound();
            return;
        }

        $controller->$action(...$params);
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo '<h1>404 - Page introuvable</h1><p><a href="' . BASE_URL . '/">Retour à l\'accueil</a></p>';
    }
}
