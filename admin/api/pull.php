<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo var_dump($_POST);
if ( $_POST['payload'] ) {
//$result = shell_exec( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
echo "pulling";
echo passthru("echo 'passthru test'");
echo passthru( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
}
//q4RspMySWY4U7iunTHnR
?>pull completed