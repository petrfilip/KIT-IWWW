<?php
//source: https://github.com/devcoder-xyz/php-template-engine/blob/master/src/Template.php

class Template
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */

    /**
     * Template constructor.
     * @param string $path
     */
    public function __construct(string $path, string $method)
    {
        $this->path = dirname(__FILE__) . "/{$path}/{$method}.phtml";
    }

    /**
     * @param string $view
     * @param array $context
     * @return string
     * @throws \Exception
     */
    public function render(array $context = []): string
    {
        $content = $this->load(array_merge($context, ['template' => $this]));
        foreach ($context as $key => $value) {
            $content = str_replace('{{'.$key.'}}', $value, $content);
        }
        return $content;
    }

    private function load(array $context) : string
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