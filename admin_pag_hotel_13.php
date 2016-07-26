<?php
@session_start();
include_once 'includes/connection.php';
$ID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if ($type != 'admin') {
    $_SESSION['type'] = NULL;
    header("Location: http://localhost/shafiurcse02/index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administrator Page of JNU Hotel</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>

    <script type="text/javascript" src="index.js"></script>
</head>
<body>
    <div class="wraper">       
        <!--end header -->
        <?php
        if (!empty($_SESSION['type']) && $_SESSION['type'] != NULL) {
            if ($_SESSION['type'] == 'user') {
                header("Location:http://localhost/shafiurcse02/user_document_page.php");
            } if ($_SESSION['type'] == 'admin') {
                include 'includes/header_login/header_admin.php';
            }
        } else {
            $_SESSION['type'] = NULL;
            include 'includes/header.php';
        }
        ?>
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->

                <!--start right -->
                <!--end left -->
                <!--start right -->
                <div class="admin_page_right">
                    <div class="admin_page_2nddiv_main">

                        <!--<div id="admin_page_first">
                       </div>
                       <div id="admin_page_second">
                       </div>-->
                        <div id="admin_page_first"><br/>
                            <div id="admin_page_first_head">
                                <h1>JNU Hotel</h1>
                                <p> House 35/g,Road 10/a,JNU,Dhaka-1100</p>
                                <p> Phone:+088-0100012,01723-506770.</p>
                            </div> <br/>
                            <br/>
                            <!--                            <div id="admin_page_first_logout">
                                                            <a href="http://localhost/shafiurcse02/admin_logout.php" title="logout">Logout</a>
                                                        </div>-->
                            <div id="admin_page_first_output">
                                <p>
                                    <?php
                                    $Result = mysql_query(
                                            "select * from `data_jnu_hotel_13`.`user` 
                                        where `user_id`='$ID';");
                                    if (!$Result)
                                        echo mysql_error();
                                    else {
                                        $row3 = mysql_fetch_array($Result);
                                        $admin_log_name = $row3['name'];
                                        echo '<p><p id="Administrator_text">Administrator Name :<p/> 
                                            <p id="Administrator_Name">' . $admin_log_name . '<p/><p/>';
                                    }
                                    echo '<br/>';
                                    /* Inser room of JNU.hotel */
                                    if (!empty($_SESSION['double_room'])) {
                                        if (($_SESSION['double_room']) != 'no') {
                                            echo '<p id="admin_double_room">' . 'Room already has been' . '<p/>';
                                        }
                                    }

                                    if (isset($_POST['admin_room_no']) && isset($_POST['admin_adult']) && isset($_POST['admin_child']) && isset($_POST['admin_ac_nonac']) && isset($_POST['admin_room_cost'])) {
                                        $admin_room_no = $_POST['admin_room_no'];
                                        $admin_room_ac_nonac = $_POST['admin_ac_nonac'];
                                        $admin_adult = $_POST['admin_adult'];
                                        $admin_child = $_POST['admin_child'];
                                        $admin_room_cost = $_POST['admin_room_cost'];
                                        if (!empty($admin_room_no) && !empty($admin_room_ac_nonac) && !empty($admin_adult) && !empty($admin_room_cost)) {
                                            $query1 = mysql_query("select *
    from `data_jnu_hotel_13`.room");

                                            while ($row = mysql_fetch_array($query1)) {
                                                if ($row['room_no'] == $admin_room_no) {
                                                    $_SESSION['double_room'] = 'yes';
                                                    ob_clean();
                                                    header("Location: http://localhost/shafiurcse02/admin_pag_hotel_13.php");
                                                    exit();
                                                }
                                                $_SESSION['double_room'] = 'no';
                                            }
                                            $_SESSION['double_room'] = 'no';
                                            $admin_room_insert_quiry_room = mysql_query("INSERT INTO `data_jnu_hotel_13`.`room`
                                                    (`room_no`, `room_adult`, `room_child`, `room_price`) 
                                                    VALUES ('$admin_room_no','$admin_adult','$admin_child','$admin_room_cost');");
                                            $admin_room_select_quiry_room = mysql_query(
                                                    "SELECT `room_id`, `room_adult`, `room_child`, `room_price` 
                                                        FROM `room` 
                                                        WHERE `room_no`='$admin_room_no'");
                                            if (!$admin_room_select_quiry_room) {
                                                echo mysql_errno();
                                            } else {
                                                $row = mysql_fetch_array($admin_room_select_quiry_room);
                                                $room_id_for_category = $row['room_id'];
                                            }
                                            if ($admin_child > 0 && $admin_room_ac_nonac == 'AC') {
                                                mysql_query(
                                                        "INSERT INTO `data_jnu_hotel_13`.`room_category_rel`(`room_category_id`, `room_id`)
                                                            VALUES ('3','$room_id_for_category')"
                                                );
                                            } if ($admin_child > 0 && $admin_room_ac_nonac == 'Non_AC') {
                                                mysql_query(
                                                        "INSERT INTO `data_jnu_hotel_13`.`room_category_rel`(`room_category_id`, `room_id`)
                                                            VALUES ('4','$room_id_for_category')"
                                                );
                                            } if ($admin_child == 0 && $admin_room_ac_nonac == 'AC') {
                                                mysql_query(
                                                        "INSERT INTO `data_jnu_hotel_13`.`room_category_rel`(`room_category_id`, `room_id`)
                                                            VALUES ('2','$room_id_for_category')"
                                                );
                                            } else {
                                                mysql_query(
                                                        "INSERT INTO `data_jnu_hotel_13`.`room_category_rel`(`room_category_id`, `room_id`)
                                                            VALUES ('1','$room_id_for_category')"
                                                );
                                            }
                                            if ($admin_room_insert_quiry_room)
                                                echo '<p id="admin_work_output">' . 'Insert the Room No :<p/><p id="admin_work_output2">' . $admin_room_no . '<p/><br/>';
                                            else {
                                                echo 'Sorry to insertion room' . mysql_error();
                                            }
                                        }
                                    }

                                    /* Room Detelte */
                                    $_SESSION['double_room'] = 'no';
                                    if (isset($_POST['admin_room_delete_id'])) {
                                        $admin_delete_room1 = $_POST['admin_room_delete_id'];
                                        if (!empty($admin_delete_room1)) {
                                            $admin_select_delete_room = mysql_query(
                                                    "SELECT `room_id`, `room_adult`, `room_child`, `room_price` 
                                                        FROM `room` 
                                                        WHERE `room_no`='$admin_delete_room1'");
                                            if (!$admin_select_delete_room) {
                                                echo mysql_errno();
                                            } else {
                                                $row = mysql_fetch_array($admin_select_delete_room);
                                                $room_id_category = $row['room_id'];
                                                $quiry_delete_category_id = mysql_query("
                                                     DELETE FROM `data_jnu_hotel_13`.`room_category_rel` 
                                                    WHERE  `room_category_rel`.`room_id` = '$room_id_category'");
                                                if ($room_id_category) {
                                                    if ($quiry_delete_category_id) {
                                                        $quiry_room_delete = mysql_query("
                                               DELETE FROM `data_jnu_hotel_13`.`room` 
                                               WHERE `room`.`room_no` = '$admin_delete_room1'
                                                                ");
                                                        if ($quiry_room_delete) {
                                                            echo '<p id="admin_work_output">' .
                                                            'Delete Room On :<p/><p id="admin_work_output2">' .
                                                            $admin_delete_room1 . '<p/>';
                                                            $admin_delete_room1 = '';
                                                        }
                                                    }
                                                } else {
                                                    echo '<p id="admin_work_output">' . 'Room Does not found' . '<p/>';
                                                }
                                            }
                                        }
                                    }
                                    /* Detele Delete Customer Resistration resistration of JNU.hotel
                                      DELETE FROM `data_jnu_hotel_13`.`user` WHERE `user`.`user_id` = 2 */

                                    if (isset($_POST['admin_user_delete_name']) && isset($_POST['admin_user_delete_email']) && isset($_POST['admin_user_delete_phone'])) {
                                        $admin_user_delete_id = $_POST['admin_user_delete_name'];
                                        $admin_user_delete_email = $_POST['admin_user_delete_email'];
                                        $admin_user_delete_phone = $_POST['admin_user_delete_phone'];
                                        if (!empty($admin_user_delete_id) && !empty($admin_user_delete_email) && !empty($admin_user_delete_phone)) {
                                            $query2 = "select * from `data_jnu_hotel_13`.`user` 
                                                        WHERE `user_id`='$admin_user_delete_id' 
                                                            AND `email`='$admin_user_delete_email' 
                                                                AND `mobile_no`='$admin_user_delete_phone'";
                                            $admin_select_user_resist = mysql_query($query2);
                                            if ($admin_select_user_resist == TRUE) {
                                                if (mysql_num_rows($admin_select_user_resist) == TRUE) {

                                                    $row = mysql_fetch_array($admin_select_user_resist);
                                                    $admin_user_email = $row['email'];
                                                    if ($admin_user_email == $admin_user_delete_email) {
                                                        $quiry_user_delete_details = mysql_query("
                                               DELETE FROM `data_jnu_hotel_13`.`user` 
                                               WHERE `user`.`email` = '$admin_user_delete_email'
                                                                ");
                                                        if ($quiry_user_delete_details)
                                                            echo 'Delete email is ' . $admin_user_delete_email;
                                                    }
                                                }
                                            } else {
                                                echo 'User ' . $admin_user_delete_id . 'is not found';
                                            }
                                        } else {
                                            echo 'insert all information';
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <h3>Room Insertion</h3>
                            <form action="admin_pag_hotel_13.php" method="POST">
                                <table id="admin_page_first_table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/room_id.png" width="60" height="16"></td>
                                        <td><input type="text" name="admin_room_no" maxlength="9" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/adult.png" width="60" height="16"></td>
                                        <td>
                                            <select name="admin_adult">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/child.png" width="60" height="16"></td>
                                        <td>
                                            <select name="admin_child">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td> <img src="images/ac_nonac.png" width="100" height="16"></td>
                                        <td>
                                            <select name="admin_ac_nonac">
                                                <option value="AC">AC</option>
                                                <option value="Non_AC">Non AC</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/room_cost.png" width="100" height="16"></td>
                                        <td><input type="text" name="admin_room_cost" maxlength="4" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="reset" value="reset"></td>
                                        <td  align="right"><input type="submit" name="admin_room_insert" title="insert Room" value=" Press "></td>
                                    </tr>
                                </table>
                            </form>
                            <h2> Room Delete </h2>
                            <form action="admin_pag_hotel_13.php" method="POST">
                                <table id="admin_page_first_table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/room_id.png" width="60" height="16"></td>
<!--                                        <td><input type="text" name="admin_room_delete_id" maxlength="9"/></td>-->
                                        <td>
                                            <select name="admin_room_delete_id">
                                                <?php
                                                $Result = mysql_query(
                                                        "SELECT `room_no` FROM `room` WHERE 1");
                                                if (!$Result)
                                                    echo mysql_error();
                                                else {
                                                    while ($row = mysql_fetch_array($Result)) {
                                                        $row = array_unique($row);
                                                        foreach ($row as $value) {
                                                            echo '<option value=' . $value . '>' . $value . '  ' . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="reset" value="reset"></td>
                                        <td align="right"><input type="submit" name="admin_room_insert" title="Delete Room" value=" Press "></td>
                                    </tr>
                                </table>
                            </form>
                            <h2> Delete Customer Resistration</h2>
                            <form action="admin_pag_hotel_13.php" method="POST">
                                <table id="admin_page_first_table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/user_name.png" width="80" height="16"></td>
                                        <td><input type="text" name="admin_user_delete_name" maxlength="40" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/user_email.png" width="80" height="16"></td>
                                        <td><input type="email" name="admin_user_delete_email" maxlength="40"  /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/user_phone.png" width="80" height="16"></td>
                                        <td><input type="tex" name="admin_user_delete_phone" maxlength="15"  /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="reset" value="reset"></td>
                                        <td align="right"><input type="submit" name="admin_room_insert" title="Delete Customer" value=" Enter"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end right -->
                <!--end mainbody-bottom -->
            </div>
            <!--end mainbody -->
        </div>
        <?php
        include 'includes/footer.php';
        ?>
        <?php
        include_once 'includes/connection_closed.php';
        ?></div>
</body>
