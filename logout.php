<?php

session_destroy();
unset($_COOKIE['user']);
header("Location: index.html");

?>