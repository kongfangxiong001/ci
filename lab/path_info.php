<?php
print_r($_SERVER);
//echo $_SERVER['PATH_INFO'];
//echo getenv('PATH_INFO');
//echo getenv('QUERY_STRING');
echo dirname($_SERVER['SCRIPT_NAME']);