<?php
@session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resistration of  JNU Hotel</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="index.js"></script>

</head>
<body>

    <div class="wraper">       
        <?php
        if (!empty($_SESSION['type'])) {
            if ($_SESSION['type'] == 'user') {
                include 'includes/header_login/header.php';
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

                <!--start right -->
                <div id="reg_cust">
                    <?php
                    if (isset($_POST['u_name']) && isset($_POST['p_mobile']) && isset($_POST['gender']) && isset($_POST['u_email']) && isset($_POST['p_pwd']) && isset($_POST['p_r_pwd'])) {
                        $Username = $_POST['u_name'];
                        $Mobile = $_POST['p_mobile'];
                        $Email = $_POST['u_email'];
                        $gender = $_POST['gender'];
                        $Password = $_POST['p_pwd'];
                        $Confirm = $_POST['p_r_pwd'];
                        if (!empty($Username) && !empty($Mobile) && !empty($gender) && !empty($Email) && !empty($Password) && !empty($Confirm)) {
                            if ($Password == $Confirm) {
                                if (!empty($_SESSION['type'])) {
                                    if ($_SESSION['type'] == 'admin') {
                                        $QueryRegister = "INSERT INTO 
                                `user`( `name`, `password`, `email`, `mobile_no`,`gender`,`type`) 
                                VALUES ('$Username','$Password','$Email','$Mobile','$gender','admin');";
                                    }
                                } else {
                                    $QueryRegister = "INSERT INTO 
                                `user`( `name`, `password`, `email`, `mobile_no`,`gender`,`type`) 
                                VALUES ('$Username','$Password','$Email','$Mobile','$gender','user');";
                                }

                                include 'includes/connection.php';
                                if (mysql_query($QueryRegister)) {
                                    echo 'Thank you for registering';
                                    if (!empty($_SESSION['type']))
                                        if ($_SESSION['type'] == 'admin') {
                                            header("Location:http://localhost/shafiurcse02/admin_pag_hotel_13.php");
                                        } else {
                                            header("Location: http://localhost/shafiurcse02/user_login.php");
                                        }
                                } else {
                                    echo mysql_error();
                                }
                            }
                        }
                    }
                    ?>
                    <form  action="resistration.php" method="post">

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
                                <th colspan="5" id="reg_th3">" Regitration Form "</th>

                            </tr>
                            <tr>

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
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>Full Name </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="u_name" id="tex_border"  placeholder="Full Name"/></td>

                            </tr>

<!--                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>Permanent Address </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="p_per_address"  id="tex_border"/></td>

                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>Country Name </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="p_country"  id="tex_border"/></td>

                            </tr>-->
                            <tr>
                                <td>&nbsp;</td>
                                <td>Mobile No </td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td><input type="tel" name="p_mobile"  title="Mobile No" id="tex_border"/></td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Gender</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <select name="gender" title="Gender" id="tex_border">
                                        <option value="Male" >Male</option>
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
                                    <input type="email" name="u_email"  title="Email" id="tex_border"  placeholder="Email ID"/>
                                    <!---->
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="password" name="p_pwd" title="passwors" id="tex_border" placeholder="password"/>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Re-Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><p>:</p></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="password" name="p_r_pwd" title="passwors" id="tex_border" placeholder="Re-password"/>
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
                                <td align="left"><input type="reset" value="reset"></td>
                                <td colspan="3" align="right" id="tex_border">
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
