<?php

namespace Src;

class View
{
    private $view = '';
    private $data = [];
    private $root = '';
    private $layout = '/layouts/main.php';

    public function __construct(string $view = '', array $data = [])
    {
        $this->root = $this->getRoot();
        $this->view = $view;
        $this->data = $data;
    }

    private function getRoot(): string
    {
        $root = '';

        if (Settings::get()->path['root']) {
            $root = "/" . Settings::get()->path['root'];
        }
        if (Settings::get()->path['views']) {
            $root .= "/" . Settings::get()->path['views'];
        }

        return $_SERVER['DOCUMENT_ROOT'] . $root;
    }

    private function getPathToMain(): string
    {
        return $this->root . $this->layout;
    }

    public function render(string $view = '', array $data = []): string
    {
        $view = str_replace('.','/',$view);

        if (file_exists($this->getPathToMain()) && file_exists($this->getRoot() . "/$view.php")) {

            extract($data, EXTR_PREFIX_SAME,'');

            ob_start();
            require_once($this->getRoot() . "/$view.php");
            $content = ob_get_clean();

            return require_once($this->getPathToMain());
        }
        throw new \Exception('Ошибка рендера');
    }

    public function __toString(): string
    {
        return $this->render($this->view, $this->data);
    }

}