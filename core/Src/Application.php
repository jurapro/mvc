<?php

namespace Src;
class Application
{
    private $settings = null;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function run(): void
    {
        Route::start();
    }
}
