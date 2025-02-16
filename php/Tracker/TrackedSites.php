<?php
namespace Tracker;

class TrackedSites
{
    public function __construct()
    {
        
    }

    public function getAllTrackedSites()
    {
        $config = Config::getInstance();
        $db_config = $config->getConfig("database");
        $db = new Database($db_config);

        $websites = $db->query('SELECT * FROM websites')->fetchAll();

        $all_sites = [];

        foreach($websites as $website)
        {
            $all_sites[$website['website_code']] = ['id' => $website['id'], 'url' => cookify($website['website_url'])];
        }

        return $all_sites;
    }
}