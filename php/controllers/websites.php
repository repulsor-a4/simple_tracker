<?php
use Tracker\Database;

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Websites';

$websites = $db->query('select * from websites')->fetchAll();

require "views/websites.view.php";