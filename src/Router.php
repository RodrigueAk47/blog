<?php


namespace App;


use AltoRouter;

class Router
{
    private string $ViewPath;

    private AltoRouter $router;

    public function __construct(string $ViewPath)
    {
        $this->ViewPath = $ViewPath;
        $this->router = new AltoRouter();
    }


    public function get(string $url, string $view, ?string $name = null): Router
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function url(string $name, array $params = []): string
    {
        return $this->router->generate($name, $params);
    }

    public function run(): Router
    {
        $match = $this->router->match();
        $view = $match['target'];
        $router = $this;
        ob_start();
        require $this->ViewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->ViewPath . DIRECTORY_SEPARATOR . 'layouts/default.php';

        return $this;
    }
}