<?php
if ( $_POST['payload'] ) {
echo shell_exec( 'cd /home/bitnami/htdocs && sudo git reset –-hard HEAD && sudo git pull' );
}
//q4RspMySWY4U7iunTHnR
?>pull completed