<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resistered Page of JNU Hotel</title>

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
                <div id="reg_page">
                    <div id="reg_page_can">
                        <center>WelCome You For resistration </center>
                        <?php
                        $resist_name = $_POST['p_name'];
                        $resist_email = $_POST['p_email'];
                        $resist_mobile = $_POST['p_mobile'];
                        $resist_passwor = $_POST['p_pwd'];
                        if (isset($_POST['p_name'])) {
                            echo '<h5 align="center">' . $_POST['p_name'] . '</h5>';
                        }
                        else
                            echo 'Please insert Currect information';
                        ?>
                    </div>
                </div>
                <!--end right -->
                <!--end mainbody-bottom -->
            </div>
        </div>
        <!--end mainbody -->
         <?php
        include 'includes/footer.php';
        ?>
    </div>
</body>
