<h1>This is Movie API project</h1>
<?php
ini_set('display_errors', 1);
include_once '../config/database.php';
include_once '../config/database_old.php';

$start = microtime(true);
# the new way
$i = 0;
while($i<100){
    $database = Database::getInstance()->getConnection();
    $i++;
}
$new_time = microtime(true) - $start;

$start = microtime(true);
# the old way
$i = 0;
while($i < 100){
    $old_database = new Database_Old();
    $old_database_connection = $old_database->getConnection();
    $i++;
}
$old_time = microtime(true) - $start;

printf('New Connection takes==> %s ms'.PHP_EOL, $new_time * 1000);
printf('Old Connection takes==> %s ms'.PHP_EOL, $old_time * 1000);
printf('You saved %s ms'.PHP_EOL, ($old_time - $new_time) * 1000);
printf('New connection only takes %s%% of old connection'.PHP_EOL, ($new_time/$old_time) * 100);