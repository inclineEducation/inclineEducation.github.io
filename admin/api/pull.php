<?php
if ( $_POST['payload'] ) {
shell_exec( 'cd /home/bitnami/htdocs && git reset –-hard HEAD && git pull' );
}
//q4RspMySWY4U7iunTHnR
?>pull completed