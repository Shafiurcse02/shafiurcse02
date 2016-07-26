
<?php
include 'includes/connection.php';
?><?php
unset($_SESSION);
?>
<?php
@session_start();
?>
<?php
if (isset($_POST['user1_name']) && isset($_POST['user_pwd'])) {
    $Username = $_POST['user1_name'];
    $Password = $_POST['user_pwd'];
    if (!empty($Username) && !empty($Password)) {
        //Query for log in
        $QueryLogIn = "select * from `user` where `name`='$Username' AND `password`='$Password'";
        $Result = mysql_query($QueryLogIn);
        while ($row1 = mysql_fetch_array($Result)) {
            $_SESSION['user_name'] = $row1['name'];
            $_SESSION['user_id'] = $row1['user_id'];
            $_SESSION['user_phone'] = $row1['mobile_no'];
            $_SESSION['user_email'] = $row1['email'];
        }
        if ($Result) {
            if (mysql_num_rows($Result) == 1) {
                $row = mysql_fetch_array($Result);
                extract($row);
                ob_clean();
                header("Location:http://localhost/shafiurcse02/user_document_page.php");
            }
        } else {
            echo mysql_error();
        }
    }
}
?>

<title>Customer login to JNU Hotel</title>
<link href = "css/style.css" rel = "stylesheet" type = "text/css"/>
<link href = "css/user_log_content.css" rel = "stylesheet" type = "text/css"/>
<script type = "text/javascript" src = "js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="index.js"></script>
</head>

<body>
    <div class="wraper">       
        <?php
        include 'includes/header.php';
        ?>
        <!--end header -->	<!--start mainbody -->
        <div class="mainbody">

            <!--start mainbody-bottom -->
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="http://localhost/shafiurcse02/required_room.php" method="post" id="onlinebooking">
                        <?php
                        include 'includes/left_search.php';
                        ?>
                    </form>
                    <?php
                    include 'includes/email_page.php';
                    ?>
                </div>
                <!--end left -->
                <!--start right -->
                <div class="right">
                    <div class="user_login_right">
                        <form  action='user_login.php' method="POST">
                            <p class="design">&nbsp;</p>
                            <table>
                                <tr>
                                    <th colspan="5" id="reg_blank1">&nbsp;</th>
                                </tr>
                                <tr>
                                    <th colspan="6" id="user_th">JNU Hotel</th>
                                </tr>
                                <tr>
                                    <th colspan="6" id="user_th1">" User login"</th>

                                </tr>
                                <tr>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;

                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>User Name</td>
                                    <td><p>:</p></td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="user1_name" title="user name" class="search_tex" placeholder=" user name"
                                               maxlength="20" id="tex_border"/>
                                        <!-- -->
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>UserPassword</td>
                                    <td><p>:</p></td>
                                    <td>&nbsp;</td>
                                    <td><input type="password" name="user_pwd" title="Password" maxlength="15" class="search_tex"
                                               placeholder="   Password" onclick="if ( value == '' ) { value = ''; }" id="tex_border"/></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="resistered" align="right">
                                        <a href="http://localhost/shafiurcse02/resistration.php">Resister</a></td>
                                    <td colspan="4" id="ser_sub" align="right">
                                        <input type="submit" value="submit"/>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
                <!--end right -->
            </div>
            <!--end mainbody-bottom -->
        </div>
        <!--end mainbody -->
        <?php
        include 'includes/footer.php';
        ?> 
    </div>
</body>
