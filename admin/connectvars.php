<?php
  // Define database connection constants
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'project');

  $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die (mysql_error());
  $db = mysql_select_db(DB_NAME, $conn) or die (mysql_error());
?>
