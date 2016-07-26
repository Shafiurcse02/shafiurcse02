<?php
@session_start();
$ID = $_SESSION['user_phone'];
if (!isset($ID)) {
    ob_clean();
    header("Location: http://localhost/shafiurcse02/index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Bill of JNU Hotel</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
    <div class="wraper">       
        <?php
        include 'includes/header_login/header.php';
        $_SESSION['user_id'] = $ID;
        ?>
        <!--end header -->
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->
                <!--start right -->
                <div id="reg_cust">
                    <form  action="#" method="post">

                        <p class="design">&nbsp;</p>
                        <table>
                            <tr>
                                <th colspan="5" id="reg_blank1">&nbsp;</th>
                            </tr>
                            <tr>
                                <th colspan="5" id="reg_th">JNU Hotel</th>
                            </tr>
                            <tr>
                                <th colspan="5" id="reg_th1"> House 35/g,Road 10/a,JNU,Dhaka-1100</th>
                            </tr>
                            <tr>
                                <th colspan="5" id="reg_th2">Phone:+088-0100012,01723-506770.</th>
                            </tr>
                            <tr>
                                <th colspan="5" id="reg_th3">"Bill Form "</th>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>ID</td>
                                <td id="bill_id">
                                    <?php
                                    if (!empty($_SESSION['room_no'])) {
                                        echo '<h5>: ' . $_SESSION['room_no'] . '</h5>';
                                    } else {
                                        echo '<h5>: ' . 'None.' . '</h5>';
                                    }
                                    ?>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_name">Name :</td>
                                <td colspan="3">
                                    <?php
                                    echo ': ' . $_SESSION['user_name'];
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_name">Email ID  </td>
                                <td colspan="3">
                                    <?php
                                    echo ': ' . $_SESSION['user_email'];
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_name">Mobile No</td>
                                <td colspan="3">
                                    <?php
                                    echo ': ' . $_SESSION['user_phone'];
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_name">Check in Date</td>
                                <td colspan="3">
                                    <?php
                                    if (!empty($_SESSION['check_in'])) {
                                        echo '<h5>: ' . $_SESSION['check_in'] . '</h5>';
                                    } else {
                                        echo '<h5>: ' . 'None.' . '</h5>';
                                    }
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_name">Check Out Date</td>
                                <td colspan="3">
                                    <?php
                                    if (!empty($_SESSION['check_out'])) {
                                        echo '<h5>: ' . $_SESSION['check_out'] . '</h5>';
                                    } else {
                                        echo '<h5>: ' . 'None.' . '</h5>';
                                    }
                                    ?>
                                </td>

                            </tr>


                            <!--                                                        $_SESSION[`room_id`] = $user_Reserved_room_id;
                                                        $_SESSION['room_no'] = $user_Reserved_room_no;
                                                        $_SESSION['`room_price`'] = $user_Reserved_room_price;
                                                        $_SESSION['`check_in`'] = $user_Reserved_room_check_in;
                                                        $_SESSION['`check_out`'] = $user_Reserved_room_check_out;-->
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="4">
                                    <?php
                                    echo '<hr/>';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_content">Room Price &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>

                                <td align="center">
                                    <?php
                                    if (!empty($_SESSION['room_price'])) {
                                        $reserved_day_num = $_SESSION['check_out'] - $_SESSION['check_in'];
                                        echo '<h5>' . $_SESSION['room_price'] * $reserved_day_num . '</h5>';
                                    } else {
                                        echo '<h5>' . 'None.' . '</h5>';
                                    }
                                    ?>
                                </td>
                                <td>&nbsp;</td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_content">Food Cost &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>

                                <td align="center">
                                    <?php
                                    if (!empty($_SESSION['room_no'])) {
                                        $gg = $_SESSION['user_id'];
                                        $Q = "SELECT sum(price)  s FROM `food` f,`food_order` fd "
                                                . "WHERE f.`food_id`=fd.`food_id` and fd.`user_id`='$gg' group by fd.user_id";
//                        }
//                           "select * from `reservation`,`room`
//WHERE `room`.`room_id`=`reservation`.`room_id` AND `reservation`.`user_id`='$user_id'";
                                        $Resu = mysql_query($Q);
                                        $costed = "0";
//                                        while ($row7 = mysql_fetch_array($Resu)) {
//                                            $user_Reserved_room_food_cost = $row7['s'];
//                                            echo 'hhhfghfh' . $user_Reserved_room_food_cost;
//                                            $costed+= $user_Reserved_room_food_cost;
//                                            echo $costed . "tytytry" . $gg;
//
                                            echo $costed;
//                                        }
//                                        echo 'SDjsfkjsfjsdfjl';
                                    } else {
                                        echo '111';
                                    }
                                    if (!empty($_SESSION['cost'])) {
                                        echo $_SESSION['cost'];
                                    }
                                    ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="1">
                                    <?php
                                    echo '<hr/>';
                                    ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td id="bill_Total">Total Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td align="center">
                                    <?php
                                    if (!empty($_SESSION['room_price']) && !empty($reserved_day_num)) {
                                        $ds = $_SESSION['room_price'] * $reserved_day_num + $costed;
                                        echo $ds;
                                    }
                                    ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="4" align="right">
                                    <input type="submit" value="Print"/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!--end right -->
                <!--end mainbody-bottom -->
            </div>
            <!--end mainbody -->

        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </div>

</body>
