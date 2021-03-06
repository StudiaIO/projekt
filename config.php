<?php
$conf->debug = true; # set true during development and use in your code (for instance check if true to send additional message)

# ---- Webapp location
$conf->server_name = 'localhost';   # server address and port
$conf->protocol = 'http';           # http or https
$conf->app_root = '/projekt/public';   # project subfolder in domain (relative to main domain)

# ---- Database config - values required by Medoo
$conf->db_type = 'mysql';
$conf->db_server = 'mysql-hostel.mysql.database.azure.com';
$conf->db_name = 'hostel';
$conf->db_user = 'dbadmin@mysql-hostel';
$conf->db_pass = 'zaq1@WSX';
$conf->db_charset = 'utf8';

# ---- Database config - optional values
$conf->db_port = '3306';
#$conf->db_prefix = '';
$conf->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

# ---- Assets
$conf->styles = $conf->app_root.'/assets/css';
$conf->scripts = $conf->app_root.'/assets/js';
$conf->images = $conf->app_root.'/assets/images';


//$conf->debug = false;