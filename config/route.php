<?php
use Src\Route;

Route::add('/mvc/post', [Controller\Site::class, 'index']);
Route::add('/mvc/user', [Controller\Site::class, 'user']);