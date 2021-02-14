<?php
//source: https://github.com/devcoder-xyz/php-template-engine/blob/master/src/Template.php

class Template
{
    private $path;

    public function __construct(string $dir, string $method)
    {
        $this->path = dirname(__FILE__) . "/{$dir}/{$method}.phtml";
    }

    public function render(array $context = []): string
    {
        if (!file_exists($file = $this->path)) {
            throw new \Exception(sprintf('The file %s could not be found.', $file));
        }

        extract($context);

        ob_start();

        include ($file);

        return ob_get_clean();
    }

    public static function redirect(string $target) {
        ob_start();
        header('Location: '. $target);
        ob_get_clean();
    }

}