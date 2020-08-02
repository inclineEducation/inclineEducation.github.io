<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo var_dump($_POST);
if ( $_POST['payload'] ) {
//$result = shell_exec( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
echo "pulling\n";
echo passthru("echo 'passthru test'");
echo passthru( 'cd /home/bitnami/htdocs 2>&1 && sudo git reset --hard 2>&1 HEAD && sudo git pull 2>&1' );
}
//q4RspMySWY4U7iunTHnR
?>pull completed