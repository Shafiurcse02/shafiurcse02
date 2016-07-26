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
    <title>Customer reservation Page of JNU Hotel</title>

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
                ?>
                <!--end left -->
                <!--start right -->
                <div class="right_document">
                    <div id="doc_head">JNU Hotel</div>
                    <center id="welcome2"> <p>Cancelation Page </p>
                    </center>
                    <div id="order_area"><?php
                        if (!empty($_SESSION['room_no']) && !empty($_SESSION['user_id'])) {
                            if (isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_room_no'])) {
                                if ($user_email = $_POST['user_email'] && $user_phone = $_POST['user_phone'] && $_POST['user_room_no'] = $_SESSION['room_no']) {
                                    $ddate = date("d-m-Y");
                                    $date = strtotime($ddate);
                                    $date = strtotime("-1 day", $date);
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y", $date);
                                    echo $user_id;
                                    $st_time = strtotime($_SESSION['check_in']);
                                    $end_time = strtotime($_SESSION['check_out']);
                                    $cur_time = strtotime($date);

                                    $date = date('d-m-Y', $date);
                                    if ($st_time >= $cur_time && $end_time >= $cur_time) {
                                        $r=$_SESSION['room_id'];
                                         $odcan = mysql_query("
                                                     DELETE FROM `data_jnu_hotel_13`.`food_order` 
                                                    WHERE  `food_order`.`user_id`=$user_id");
                                        $romcan = mysql_query("
                                                     DELETE FROM `data_jnu_hotel_13`.`reservation` 
                                                    WHERE  `reservation`.`room_id` = '$r' AND `reservation`.`user_id`=$user_id");
                                        if ($romcan)
                                        {
                                            echo 'You are success cancel reservation.';
                                            $_SESSION['room_no']='';
                                          
                                        }
                                    } else {
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;Sorry,You are unable to cancel  Reservation';
                                    }
                                }
                            }
                        }
                        ?>

                        <form action="cancel.php" method="POST">
                            <table id="user_order_area_page_first_table">
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td> <td>&nbsp;</td>
                                    <td><img src="images/user_email.png" width="80" height="16"></td>
     <!--                                        <td><input type="text" name="admin_room_delete_id" maxlength="9"/></td>-->
                                    <td><input type="email" name="user_email" maxlength="40"  />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td><img src="images/user_phone.png" width="80" height="16"></td>
                                    <td><input type="tex" name="user_phone" maxlength="15"  /></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <th>ROOM NO</th><td>
                                        <input type="tex" name="user_room_no" maxlength="15"  />
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
                                    <td align="right"><input type="submit" name="admin_room_insert" title="Delete Room" value=" Press "></td>
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
