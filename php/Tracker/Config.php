<?php
namespace Tracker;

class Config
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            'database' => [
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'tracker',
                'charset' => 'utf8mb4',
            ],
        ];
    }

    public static function getInstance(): Config
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConfig($key): mixed
    {
        return $this->config[$key];
    }
}