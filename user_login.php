
<?php
include 'includes/connection.php';
unset($_SESSION);

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
            $user_type = $row1['type'];
            $_SESSION['type'] = $user_type;
        }
        if ($Result) {
            if (mysql_num_rows($Result) == 1&&$user_type=='user') {
                $row = mysql_fetch_array($Result);
                extract($row);
                ob_clean();
                header("Location:http://localhost/shafiurcse02/user_document_page.php");
            }  else {
                unset($_SESSION);
                 header("Location:http://localhost/shafiurcse02/user_login.php");
            }
        } else {
            echo mysql_error();
        }
    }
}
?>

<title>Customer login to JNU Hotel</title>
<link href = "css/log_user/style.css" rel = "stylesheet" type = "text/css"/>
<link href = "css/log_user/log_new.css" rel = "stylesheet" type = "text/css"/>
<link href = "css/log_user/user_log_content.css" rel = "stylesheet" type = "text/css"/>
<script type = "text/javascript" src = "js/jquery-1.4.min.js"></script>
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
                $_SESSION['type']=NULL;
                include 'includes/header.php';
            }
        } else {
            include 'includes/header.php';
        }
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
                    <div class="user_login_right" id="user-log">
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
                                <td>&nbsp;&nbsp;&nbsp;</td>
                            </td><td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr style="margin-bottom: 100px;">
                        <th colspan="5" style="padding-bottom: 50px;">
                    <form action="user_login.php" method="post" id="register-form" novalidate="novalidate" >

                        <div class="label">User Name:</div>
                        <input type="text" name="user1_name" title="user name" class="search_tex" placeholder=" user name"
                               maxlength="20" id="tex_border"/></br>
                        <div class="label">User password:</div>
                        <input type="password" name="user_pwd" title="Password" maxlength="15"
                               placeholder="   Password" onclick="if (value == '') {
                                           value = '';
                                       }" id="tex_border"/>
                        <div id="sub_reg">
                            <a href="http://localhost/shafiurcse02/resistration.php">Resister</a></div>
                        <input type="submit" value="submit" style="background-position: right;width: 15%;margin-left: 126px;margin-top: -20px;"/>


                    </form>

                    </th>

                    </tr>

                </table>

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
