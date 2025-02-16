<?php
use Tracker\Database;

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Website';

$website = $db->query('SELECT * FROM websites WHERE id = :id', ['id' => $_GET['id']])->fetch();

$website_unique_visits = $db->query(
    'SELECT * FROM visitors WHERE website_id = :website_id',
    ['website_id'=> $_GET['id']])->fetchAll();

require "views/website.view.php";