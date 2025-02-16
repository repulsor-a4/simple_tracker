<?php

use Tracker\Cookie as Cookie;
use Tracker\Tracker as Tracker;
use Tracker\Config as Config;
use Tracker\Database as Database;
use Tracker\TrackedSites as TrackedSites;

// get the tracked sites
$tracked_sites = new TrackedSites();
$tracked_sites_info = $tracked_sites->getAllTrackedSites();

// get the cookie name and the website_id
$cookie_name = $tracked_sites_info[$_GET['siteCode']]['url'];
$website_id = $tracked_sites_info[$_GET['siteCode']]['id'];

// if there is siteCode present in the script then create a Tracker instance
// and under appropriate conditions create a unique visitor
if (isset($_GET['siteCode']))
{
    $trackedPage = getTrackedPageOnly($_GET['trackingPage']);

    $cookie = new Cookie();
    $tracker = new Tracker($cookie);
    $t = $tracker->init($_GET['siteCode'], $trackedPage);

    // insert a unique visitor only if the tracker returns true
    // check Tracker.php for the conditions
    if ( $t === true)
    {
        // write code to insert to the visitors table
        $config = Config::getInstance();
        $db_config = $config->getConfig("database");
        $db = new Database($db_config);

        $insert_params = [
            'website_id' => $website_id,
            'ip_address' => filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP),
            'page_name' => $trackedPage,
            'timestamp' => date('Y-m-d H:i:s'),
        ];

        $db->query("INSERT INTO `visitors` (`website_id`, `ip_address`, `page_name`, `timestamp`) VALUES (:website_id, :ip_address, :page_name, :timestamp)", $insert_params);
    }
}
else
{
    dd("The website already contains a cookie. This is not a unique visit!");
}