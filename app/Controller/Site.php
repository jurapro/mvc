<?php

namespace Controller;

use Model\User;
use Src\View;
use Model\Post;

class Site
{
    public function index(): string
    {
        $view = new View();
        return $view->render('site.post',['model'=>(new Post())->all()]);
    }

    public function user(): string
    {
        return new View('site.user', ['model'=>(new User())->all()]);
    }
}
