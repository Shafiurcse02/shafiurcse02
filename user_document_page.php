<?php
include 'includes/connection.php';
@session_start();
$ID = $_SESSION['user_id'];
if (!isset($ID)) {
    ob_clean();
    header("Location: http://localhost/shafiurcse02/index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Documentantion Page of JNU Hotel</title>

    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/cust_document.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>

    <script type="text/javascript" src="index.js"></script>

</head>

<body>

    <div class="wraper">  
        <?php
        if ($_SESSION['type'] == 'user') {
            include 'includes/header_login/header.php';
        } else {
            include 'includes/header.php';
        }
        ?>
        <!--end header -->
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="required_room.php" method="post">
                        <?php
                        include 'includes/left_search.php';
                        ?>
                    </form>
                </div>
                <?php
                $user_login_room = '';
                $user_id = $_SESSION['user_id'];
                $_SESSION['user_id'] = $user_id;
                $user_name = $_SESSION['user_name'];
                $user_email = $_SESSION['user_email'];
                $user_phone = $_SESSION['user_phone'];

                if (!empty($_SESSION['fsearch'])) {
                    $d1 = $_SESSION['d1'];
                    $d2 = $_SESSION['d2'];
                    $date1 = date("d-m-Y", strtotime($d1));
                    $date2 = date("d-m-Y", strtotime($d2));

                    if (!empty($_GET['id'])) {
                        $customer_room = $_GET['id'];
                        $_SESSION['room_no'] = $customer_room;
                        $text = "SELECT * FROM `room` WHERE `room_no`='$customer_room'";

                        $text_qury = mysql_query($text);
                        while ($row = mysql_fetch_array($text_qury)) {
                            $roo = $row['room_id'];
                        }
                        if (!empty($roo )) {
                              mysql_query("INSERT INTO `reservation`"
                                . "(`user_id`, `room_id`, `check_in`, `check_out`) VALUES ('$user_id','$roo','$date1','$date2')");
                        }
                      
                    }
                }
                ?>
                <!--end left -->
                <!--start right -->
                <div class="right_document">
                    <div id="doc_head">JNU Hotel</div>
                    <center id="welcome2"> <p>WelCome You For login </p>
                    </center>
                    <div id="user_AREA"><?php
                        $QueryLogIn = "SELECT * FROM `room` r,`reservation` re WHERE r.`room_id`=re.`room_id` and re.`user_id`=$user_id";
//                        
//                           "select * from `reservation`,`room`
//WHERE `room`.`room_id`=`reservation`.`room_id` AND `reservation`.`user_id`='$user_id'";
                        $Result = mysql_query($QueryLogIn);
                        while ($row = mysql_fetch_array($Result)) {
                            $user_Reserved_room_no = $row['room_no'];
                            $user_Reserved_room_price = $row['room_price'];
                            $user_Reserved_room_id = $row['room_id'];
                            $user_Reserved_room_check_in = $row['check_in'];
                            $user_Reserved_room_check_out = $row['check_out'];
                            $_SESSION['room_id'] = $user_Reserved_room_id;
                            $_SESSION['room_no'] = $user_Reserved_room_no;
                            $_SESSION['room_price'] = $user_Reserved_room_price;
                            $_SESSION['check_in'] = $user_Reserved_room_check_in;
                            $_SESSION['check_out'] = $user_Reserved_room_check_out;
                        }

                        echo '<table>
                        <tr><td><p id=' . '"user_fixed"' . '>Name      </p></td><td id=' . '"user_dynamic"' . '>: ' . $user_name . '</td></tr><br/>' .
                        '' .
                        ' <tr><td><p id=' . '"user_fixed"' . '>Email      </p></td><td id=' . '"user_dynamic"' . '>: ' . $user_email . '</td></tr><br/>' .
                        ' <tr><td><p id=' . '"user_fixed"' . '>Mobile      </p></td><td id=' . '"user_dynamic"' . '>: ' . $user_phone . '</td></tr><br/>';
                        if (!empty($user_Reserved_room_no)) {
                            echo '<tr><td><p id=' . '"user_fixed"' .
                            '>Reserved Room  </p></td><td id=' . '"user_dynamic"' .
                            '>: Your reserved room  no is ' . $user_Reserved_room_no . '</td></tr>';
                        } else {
                            echo '<tr><td><p id=' . '"user_fixed"' .
                            '>Reserved Room  </p></td><td id=' . '"user_dynamic"' .
                            '>: ' . 'You have no reserved room' . '</td></tr>';
                        }

                        if (!empty($user_Reserved_room_check_in)) {
                            echo '<tr><td><p id=' . '"user_fixed"' .
                            '>Check in Date  </p></td><td id=' . '"user_dynamic"' .
                            '>: ' . $user_Reserved_room_check_in . '</td></tr>';
                        }
                        if (!empty($user_Reserved_room_check_out)) {
                            echo '<tr><td><p id=' . '"user_fixed"' .
                            '>Check out Date  </p></td><td id=' . '"user_dynamic"' .
                            '>: ' . $user_Reserved_room_check_out . '</td></tr>';
                        }
                        echo '<br/>' . '</table>';

                        echo '<br/>';
                        ?></div>


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
