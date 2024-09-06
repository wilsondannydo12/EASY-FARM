<?php  
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','agroBusiness_wils');

// base link
define('BASE_LINK','http://localhost/agroBusiness/transport');
define('MARKET_BASE_LINK','http://localhost/agroBusiness/market');
define('HOME_BASE_LINK','http://localhost/agroBusiness');
define('BACK_BASE_LINK','http://localhost/agroBusiness/back');

// Establish database connection.
try
{
$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


include ("function.php");
?>