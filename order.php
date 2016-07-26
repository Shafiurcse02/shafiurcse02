<?php
include 'includes/connection.php';
@session_start();
$ID = $_SESSION['user_id'];
if (!isset($ID)) {
    ob_clean();
    header("Location: http://localhost/shafiurcse02/index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Documentantion Page of JNU Hotel</title>

    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/cust_document.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>

    <script type="text/javascript" src="index.js"></script>

</head>

<body>

    <div class="wraper">  
        <?php
        if ($_SESSION['type'] == 'user') {
            include 'includes/header_login/header.php';
        } else {
            include 'includes/header.php';
        }
        ?>
        <!--end header -->
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="required_room.php" method="post">
                        <?php
                        include 'includes/left_search.php';
                        ?>
                    </form>
                </div>
                <?php
                $user_login_room = '';
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];
                $user_email = $_SESSION['user_email'];
                $user_phone = $_SESSION['user_phone'];

                $ddate = date("d-m-Y");
                $date = strtotime($ddate);
                $dc = $date;
                $d11 = strtotime($_SESSION['check_in']);
                $d22 = strtotime($_SESSION['check_out']);
                $date = date('d-m-Y', $date);
                ?>
                <!--end left -->
                <!--start right -->
                <div class="right_document">
                    <div id="doc_head">JNU Hotel</div>
                    <center id="welcome2"> <p>You can order Foods </p>
                    </center>
                    <div id="order_area"><?php
                        if (!empty($_SESSION['room_no']) && !empty($_SESSION['user_id'])) {
                            if (isset($_POST['admin_food_name']) && isset($_POST['item_no'])) {
                                $fff = $_POST['admin_food_name'];
                                $Res = mysql_query(
                                        "SELECT  * FROM `food` WHERE food_name='$fff'");

                                if (!$Res) {
                                    echo 'Sorry' . mysql_errno();
                                } else {
                                    $row = mysql_fetch_array($Res);
                                    $ordered_food_id = $row['food_id'];
                                }


//                                echo $date;
                                $num = $_POST['item_no'];
                                if (!empty($ordered_food_id) && $d11 >= $dc && $d22 >= $dc) {
                                    $order_fo = mysql_query("INSERT INTO `data_jnu_hotel_13`.`food_order`(`user_id`, `food_id`, `food_date`, `num`) 
                            VALUES ('$user_id','$ordered_food_id','$date','$num')");

           
                                    
                                    
//                                    echo 'SSSSSS' . $ordered_food_id;
//
//                                    mysql_query(" INSERT INTO `data_jnu_hotel_13`.`food_order`(`user_id`, `food_id`, `food_date`, `num`) 
//                            VALUES ('$user_id','$ordered_food_id','$date','$num')"
//                                    );
                                    if ($order_fo) {
                                        echo 'Thank you for ordering food';
                                        $ordered_food_id=' ';
                                    } else {
                                        echo 'Sorry';
                                    }
                                }
                            }
                        }

//                        $Result = mysql_query($QueryLogIn);
//                        while ($row = mysql_fetch_array($Result)) {
//                            $user_Reserved_room_no = $row['room_no'];
//                            $user_Reserved_room_price = $row['room_price'];
//                            $user_Reserved_room_id = $row['room_id'];
//                            $user_Reserved_room_check_in = $row['check_in'];
//                            $user_Reserved_room_check_out = $row['check_out'];
//                            $_SESSION['room_id'] = $user_Reserved_room_id;
//                            $_SESSION['room_no'] = $user_Reserved_room_no;
//                            $_SESSION['room_price'] = $user_Reserved_room_price;
//                            $_SESSION['check_in'] = $user_Reserved_room_check_in;
//                            $_SESSION['check_out'] = $user_Reserved_room_check_out;
//                        }
                        ?>

                        <form action="order.php" method="POST">
                            <table id="user_order_area_page_first_table">
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td> <td>&nbsp;</td>
                                    <td><img src="images/food_name.png" width="100" height="17"></td>
    <!--                                        <td><input type="text" name="admin_room_delete_id" maxlength="9"/></td>-->
                                    <td>
                                        <select name="admin_food_name">
                                            <?php
                                            $Result = mysql_query(
                                                    "SELECT  `food_name` FROM `food` WHERE 1");
                                            if (!$Result)
                                                echo mysql_error();
                                            else {
                                                while ($row = mysql_fetch_array($Result)) {
                                                    $row = array_unique($row);
                                                    foreach ($row as $value) {
                                                        echo '<option value=' . $value . '>' . $value . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <th><img src="images/number.PNG" width="80" height="40"></th><td>
                                        <select name="item_no">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input type="reset" value="reset"></td>

                                    <?php
                                    if (!empty($d11) && !empty($d22) && !empty($dc)) {

                                        if ($d11 <= $dc && $d22 >= $dc) {
                                            echo '<td align="right"><input type="submit" name="admin_room_insert" 
                                                             title="order food" value=" Press "></td>';
                                        } else {
                                            echo '<td align="right">Not permitted</td>';
                                        }
                                    } else {
                                        echo '<td align="right">Not permitted</td>';
                                    }
                                    ?>

                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <!--end right user_name-->
                <!--end mainbody-bottom -->
            </div>
            <!--end mainbody -->
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </div>

</body>
