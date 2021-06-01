<?php
session_unset(); 
session_destroy();
session_commit();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

header('location: index.php');