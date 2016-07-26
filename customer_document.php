
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Documentantion Page of JNU Hotel</title>
    <link href="css/cust_document.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>

    <script type="text/javascript" src="index.js"></script>

</head>

<body>

    <div class="wraper">  
        <?php
        if ($_SESSION['type']=='user') {
            include 'includes/header_login/header.php';
        }elseif (($_SESSION['type']=='admin')) {
            include 'includes/header_login/header_admin.php';
        } else {
            include 'includes/header.php';
        }
        ?>
        <!--end header -->
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->

                <!--start right -->
                <div class="left">
                    <div id="contact_t_head1">Online Search</div>
                    <form action="#" method="post">
                        <?php
                        include 'includes/left_search.php';
                        ?>
                    </form>
                </div>
                <!--end left -->
                <!--start right -->
                <div class="right_document">
                    <div id="doc_head">JNU Hotel</div>
                    <center id="welcome1">WelCome You For Reservation</center>

                    <div id="docu_button">
                        <ol>
                            <li id="doc_logout"><a href="http://localhost/shafiurcse02/user_login.php">Log Out</a>
                            </li> 
                            <li id="doc_bill">
                                <a href="http://localhost/shafiurcse02/cust_bill.php" target="_blank">Bill</a>
                            </li> 
                            <li id="doc_profile">
                                <a href="#">Profile</a>
                            </li> 
                            <li id="doc_room">
                                <a href="#">Rooms</a>
                            </li> 
                        </ol>
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
