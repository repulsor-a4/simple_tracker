<?php
namespace WebsiteTracker;

use Tracker\Database as Database;

class WebsiteTrackerRepository
{
    private $database;
    private $config;

    public function __construct(Database $database, array $config)
    {
        $this->database = $database;
        $this->config = $config;
    }

    public function getByTrackerId($trackerId)
    {
        return $this->database->query('SELECT id FROM websites WHERE id = :id', ['id' => $trackerId])->fetch();
    }

    public function getByWebsiteCode($website_code): mixed
    {
        return $this->database->query('SELECT * FROM websites WHERE code = :code', ['code' => $website_code])->fetch();
    }

}