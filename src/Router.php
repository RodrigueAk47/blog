<?php


namespace App;


use AltoRouter;
use function ob_get_clean;
use function ob_get_contents;
use function ob_start;
use const DIRECTORY_SEPARATOR;

class Router
{
    private $ViewPath;

    private $router;

    public function __construct(string $ViewPath)
    {
        $this->ViewPath = $ViewPath;
        $this->router = new AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null)
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function run()
    {
        $match = $this->router->match();
        $view = $match['target'];
        ob_start();
        require $this->ViewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->ViewPath . DIRECTORY_SEPARATOR . 'layouts/default.php';

        return $this;
    }
}