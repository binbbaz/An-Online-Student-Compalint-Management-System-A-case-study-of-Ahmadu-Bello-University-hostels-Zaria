
<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['admin_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['admin_id'] = $_COOKIE['admin_id'];
      $_SESSION['username'] = $_COOKIE['username']; //why cookies find out?
    }
  }
?>
