
<?php
unset($_SESSION);
include 'includes/connection.php';
@session_start();
?>
<head>
    <title>Admin login form</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>

    <script type="text/javascript" src="index.js"></script>
</head>


<body>

    <div class="wraper">       
        <?php
        if (!empty($_SESSION['type']) && $_SESSION['type'] != NULL) {
            if ($_SESSION['type'] == 'user') {
                header("Location:http://localhost/shafiurcse02/user_document_page.php");
            } if ($_SESSION['type'] == 'admin') {
                header("Location:http://localhost/shafiurcse02/admin_pag_hotel_13.ph");
            }
        } else {
            $_SESSION['type'] = NULL;
            include 'includes/header.php';
        }
        ?>
        <!--end header -->


        <!--start mainbody -->
        <div class="admin_mainbody">
            <!--start left -->
            <!--end left -->

            <!--start right -->
            <div id="ad_login">
                <?php
                if (isset($_POST['admin_name']) && isset($_POST['ad_pwd'])) {
                    $Username = $_POST['admin_name'];
                    $Password = $_POST['ad_pwd'];
                    if (!empty($Username) && !empty($Password)) {
                        //Query for log in
                        $QueryLogIn = "select * from `user` where `name`='$Username' AND `password`='$Password'";
                        $Result = mysql_query($QueryLogIn);
                        if ($Result) {
                            if (mysql_num_rows($Result) == 1) {
                                $row = mysql_fetch_array($Result);
                                $user_id = $row['user_id'];
                                $user_type = $row['type'];
                                if ($user_type == 'admin') {
                                    extract($row);
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['type'] = $user_type;
                                    ob_clean();
                                    header("Location: http://localhost/shafiurcse02/admin_pag_hotel_13.php");
                                } else {
                                    extract($row);
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['type'] = NULL;
                                    ob_clean();
                                    header("Location:http://localhost/shafiurcse02/user_login.php");
                                }
                            }
                        } else {
                            echo mysql_error();
                        }
                    }
                }
                ?>

                <form  action="admin_login.php" method="post">

                    <p class="design">&nbsp;</p>
                    <table>
                        <tr>
                            <th colspan="5" id="reg_blank1">&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="5" id="ad_th">JNU Hotel</th>
                        </tr>
                        <tr>
                            <th colspan="5" id="ad_th1">" Administrator Panel "</th>

                        </tr>
                        <tr>

                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td> &nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>Admin Name</td>
                            <td><p>:</p></td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="admin_name" value="Username" class="search_tex"
                                       onclick="if (value == 'Username') {
                                                   value = '';
                                               }" maxlength="23"/></td>

                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td>Admin Password</td>
                            <td><p>:</p></td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="password" name="ad_pwd" title="APassword" value="Password" class="search_tex" 
                                       onclick="if (value == 'Password') {
                                                   value = '';
                                               }"  maxlength="15"/>
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
                            <td>&nbsp;</td>
                            <td colspan="4" id="ad_sub" >
                                <input type="submit"  name="admin_submit" value="submit" class="ad_submit" />
                            </td>
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