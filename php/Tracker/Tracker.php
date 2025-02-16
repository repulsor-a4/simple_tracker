<?php
namespace Tracker;

class Tracker
{
    private $cookie;

    public function __construct(Cookie $cookie)
    {
        $this->cookie = $cookie;
    }

    // store a cookie
    public function init($siteCode = '', $trackedPage = '')
    {
        $siteCode = !empty($siteCode) ? $siteCode : $_GET['siteCode'];
        $trackedPage = !empty($trackedPage) ? $trackedPage : $_GET['trackedPage'];

        $config = Config::getInstance();
        $db_config = $config->getConfig("database");
        $db = new Database($db_config);
        $website = $db->query('SELECT * FROM websites WHERE website_code = :website_code', ['website_code' => $_GET['siteCode']])->fetch();

        $cookie_value = [
            'id' => $website['website_url'],
            'page' => $trackedPage,
            'duration' => time() + 300
        ];
        $cookie_val = urlencode( json_encode($cookie_value) );

        // if no cookies are being set, then set the first cookie and create a unique visitor
        if ( $this->cookie->getCookie(cookify($website['website_url'])) === false  ) {
            $this->cookie->setCookie($website['website_url'], $cookie_val, time() + 300);
            return true;
        }

        $cookie_timestamp = json_decode( $this->cookie->getCookie(cookify($website['website_url'])), true )['duration'];

        $search_params = [
            'website_id' => $website['id'],
            'page_name' => $trackedPage,
        ];

        $db_search = $db->query(
        'SELECT * FROM visitors WHERE website_id = :website_id
                AND page_name = :page_name ORDER BY timestamp DESC', $search_params
            )->fetch();
        
        $db_search_last_timestamp = isset($db_search['timestamp']) ? strtotime($db_search['timestamp']): time();
        $search_params_timestamp = $cookie_timestamp;

        $diff = $search_params_timestamp - $db_search_last_timestamp;

        // if cookie value is different from the previous cookie value
        // do another check: whether there are entries in visitors tbl older than 5 mins.
        // otherwise create a unique visitor
        if ( $this->cookie->getCookie(cookify($website['website_url'])) !== $cookie_val ) {

            // do not create a unique visitor if the page has been accessed in the previous 5 mins
            if (!empty($db_search) && $diff < 300) {
                return false;
            }

            return true;
        }

        return false;
    }
}