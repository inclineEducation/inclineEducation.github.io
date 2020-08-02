<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
if ( $_POST['payload'] ) {
echo "pulling\n";
echo passthru( 'cd /home/bitnami/htdocs 2>&1 && git reset --hard 2>&1 HEAD && git pull 2>&1' );
}
echo "pull completed";
//q4RspMySWY4U7iunTHnR
?>