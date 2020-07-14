<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login']) == true):
    print '';
    print '';
else:
    print '';
    print $_SESSION['member_name'];
endif;


