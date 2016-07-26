<?php
$customer_room = '';
session_start();
if (!empty($_GET['id'])) {
    $customer_room = $_GET['id'];
    $_SESSION['room_no'] = $customer_room;
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reservation of  JNU Hotel</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>

    <div class="wraper">       
        <?php
        include 'includes/connection.php';
        if (!empty($_SESSION['type'])) {
            if ($_SESSION['type'] == 'user') {
                $_SESSION['fsearch']='yes';
                header("Location: http://localhost/shafiurcse02/user_document_page.php");
            } if ($_SESSION['type'] == 'admin') {
                include 'includes/header_login/header_admin.php';
            }
        } else {
            include 'includes/header.php';
        }
        ?><!--end header -->


        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->
                <?php
                $d1 = $_SESSION['d1'];
                $d2 = $_SESSION['d2'];
                $date1 = date("d-m-Y", strtotime($d1));
                $date2 = date("d-m-Y", strtotime($d2));


                if (isset($_POST['c_name']) && isset($_POST['c_mobile']) && isset($_POST['c_gender']) && isset($_POST['c_email']) && isset($_POST['c_pwd']) && isset($_POST['c_r_pwd'])) {
                    $Username = $_POST['c_name'];
                    $Mobile = $_POST['c_mobile'];
                    $Email = $_POST['c_email'];
                    $gender = $_POST['c_gender'];
                    $Password = $_POST['c_pwd'];
                    $Confirm = $_POST['c_r_pwd'];
                    $customer_room = $_SESSION['room_no'];
                    $room_id = '';

                    if (!empty($Username) && !empty($Mobile) && !empty($gender) && !empty($Email) && !empty($Password) && !empty($Confirm)) {
                        if ($Password == $Confirm) {

                            $query_check = mysql_query("select `email` from `data_jnu_hotel_13`.`user` where `email`='$Email'");
                            if (!$query_check)
                                echo mysql_error();
                            else {
                                if (mysql_num_rows($query_check) == 0) {

                                    $QueryRegister = "INSERT INTO 
                                `user`( `name`, `password`, `email`, `mobile_no`,`gender`,`type`) 
                                VALUES ('$Username','$Password','$Email','$Mobile','$gender','user');";
                                    if (mysql_query($QueryRegister)) {
                                        $QueryLogIn = "select * from `user` where `name`='$Username' AND `password`='$Password' AND `email`='$Email' AND `mobile_no`='$Mobile' ";
                                        $Result = mysql_query($QueryLogIn);
                                        while ($row1 = mysql_fetch_array($Result)) {
                                            $c_user_id_rev = $row1['user_id'];
                                        }
                                        $text = "SELECT * FROM `room` WHERE `room_no`='$customer_room'";

                                        $text_qury = mysql_query($text);
                                        while ($row = mysql_fetch_array($text_qury)) {
                                            $room_id_tev = $row['room_id'];
                                        }
                                        if (!empty($c_user_id_rev) && !empty($room_id_tev) && !empty($date1) && !empty($date2)) {
                                            echo $c_user_id_rev .' '. $room_id_tev .' '. $date1 .' '. $date2;
                                            $quiry_user_delete_details = mysql_query("INSERT INTO `reservation`"
                                                    . "(`user_id`, `room_id`, `check_in`, `check_out`) VALUES ('$c_user_id_rev','$room_id_tev','$date1','$date2')");
                                            if ($quiry_user_delete_details)
                                                header("Location:http://localhost/shafiurcse02/user_login.php");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                <!--start right -->
                <div id="reg_cust">
                    <form  action="http://localhost/shafiurcse02/adservation_form.php" method="post">
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
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <th colspan="5" id="reg_th3">" Reservation Form "</th>

                            </tr>
                            <tr>
                                <td colspan="5">
                                    <?php
                                    if (!empty($user_retain))
                                        if ($user_retain) {
                                            echo 'Please alternative Email';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr id="date_ab_page">
                                <td  colspan="5">
                                    <div>
                                        <?php
                                        $d1 = $_SESSION['d1'];
                                        $d2 = $_SESSION['d2'];
                                        $date1 = date("d-m-Y", strtotime($d1));
                                        $date2 = date("d-m-Y", strtotime($d2));
                                        echo '<p align="center"> ' . '<img src="images/chech_in.png" width="80" height="22">' . $date1 . '&nbsp;&nbsp;&nbsp; ' .
                                        '<img src="images/chech_out.png" width="80" height="22">' . $date2 . '</p>';
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr id="date_ab_page">
                                <td colspan="5" >
                                    <?php
                                    if (!empty($_SESSION['room_no'])) {
                                        $customer_room = $_SESSION['room_no'];
                                        echo '<h4 align="center">' . $customer_room . '</h4>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>Full Name </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="c_name" title="Name"/></td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Mobile No </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="tel" name="c_mobile" placeholder="Mobile No" title="Mobile No"  maxlength="14"/></td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Gender</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <select name="c_gender" title="Gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Email ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="email" name="c_email" title="Email"/>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="password" name="c_pwd" title="passwors" maxlength="15"/>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Re-Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="password" name="c_r_pwd" title="passwors" maxlength="15"/>
                                </td>

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
                                    <input type="submit" value="submit"/>
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
