<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>user login page of JNU Hotel</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>




    <script type="text/javascript" src="index.js"></script>



</head>



<body>

    <div class="wraper">       
        <?php
        include 'includes/header.php';
        ?><!--end header -->


        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->

                <!--start right -->
                <div id="admin_page">
                    <div id="admin_page_can">
                        <center>After User login Page </center>
                        <?php
                        $resist_name = $_POST['user_name'];
                        $resist_passwor = $_POST['user_pwd'];
                        if ($resist_name = 'shafiur' && $resist_passwor = '123') {
                            echo '<h5 align="center">' . $_POST['user_name'] . '</h5>';
                        }
                        else
                            echo 'Please insert Currect information';
                        ?>
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


</body>
