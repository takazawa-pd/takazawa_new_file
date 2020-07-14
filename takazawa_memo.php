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




if(isset($_SESSION['cart']) == true):
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
else:
    $max = 0;
endif;

if($max == 0):
    print '';
    exit();
endif;

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';
$dbh = new PDO($dns,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

foreach($cart as $key => $val):
    $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $val;
    $stmt->excecute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $pro_name[] = $rec['name'];
    $pro_price[] = $rec['price'];
    if($rec['gazou' == '']):
        $pro_gazou[] = '';
    else:
        $pro_gazou[] = '<img src="./gazou/">';
    endif;
endforeach;

$dbh = null;

?>

<form method="post" action="kazu_change.php">
    <table>
        <tr>

        </tr>
        <?php
        for($i = 0;$i < $max;$i++):
        ?>
            <tr>
                <td><?php print $pro_name[$i]; ?></td>
                <td><?php print $pro_gazou[$i]; ?></td>
                <td><?php print $pro_price[$i]; ?>円</td>
                <td><input type="text" name="kazu<?php print $i; ?>" value="<?php echo $_POST['kazu' . $i]; ?>"></td>
                <td></td>
            </tr>
        <?php
        endfor;
        ?>
    </table>
</form>