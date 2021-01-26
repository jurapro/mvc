<?php
namespace Src;

final class Settings
{
    private static $_object = null;
    private $_settings;

    private function __construct($settings)
    {
        $this->_settings = $settings;
    }

    private function __clone()
    {

    }

    public static function get(array $settings = []): Settings
    {
        if (is_null(self::$_object)) {
            self::$_object = new self($settings);
        }
        return self::$_object;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->_settings)) {
            return $this->_settings[$key];
        }
        throw new \Error('Доступ к несуществующему свойству');
    }

}