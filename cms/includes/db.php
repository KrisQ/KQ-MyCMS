<?php 

$db['db_host'] = "shareddb-f.hosting.stackcp.net";
$db['db_user'] = "mycms";
$db['db_pass'] = "xX2gYBnM/";
$db['db_name'] = "mycmsdb-32368abe";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>