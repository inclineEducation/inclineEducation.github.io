<?php
echo var_dump($_POST);
if ( $_POST['payload'] ) {
//$result = shell_exec( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
echo "pulling";
passthru( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
}
//q4RspMySWY4U7iunTHnR
?>pull completed