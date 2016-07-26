<?php
@session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact us.. JNU Hotel</title>

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
                            <th colspan="5" id="reg_th3">" Contact Form "</th>

                        </tr>
                        <tr>

                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <th rowspan="5">
                                <?php
                                include 'includes/email_page.php';
                                ?>
                            </th>
                        </tr>
                    </table>

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
