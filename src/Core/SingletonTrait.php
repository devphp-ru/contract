<?php
declare(strict_types=1);

namespace App\Core;


trait SingletonTrait
{
    private static ?object $instance = null;

    public static function getInstance(): object
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}
}