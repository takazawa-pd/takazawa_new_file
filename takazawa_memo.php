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


$pro_code = $_GET['procode'];

if(isset($_SESSION['cart']) == true):
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    if(in_array($pro_code,$cart) == true):
        print '';
        exit();
    endif;
endif;
$cart[] = $pro_code;
$kazu[] = 1;
$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

if($php):
    print 'php';
endif;