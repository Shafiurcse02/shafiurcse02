<?php
include 'includes/connection.php';
@session_start();
if (!empty($_SESSION['room_id'])) {
    $_SESSION['room_id'] = NULL;
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Searching Rooms</title>

    <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="index.js"></script>

</head>
<body>

    <div class="wraper">       
        <!--end header -->
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
        ?>
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->

                <!--start right -->
                <!--end left -->
                <!--start right -->
                <div class="searching_all_rooms_right">
                    <form action="#" method="POST">
                        <div class="searching_all_rooms">
                            <h2>All searching Rooms is given bellow:</h2>
                            <?php
                            include 'includes/connection.php';
                            ?>
                            <?php
                            $query2 = 'select *';
                            $query2.=' from room r,room_category c ,room_category_rel c_r
                                where  c.room_category_id=c_r.room_category_id AND r.room_id=c_r.room_id';
                            $query1 = mysql_query($query2, $connection);

                            if (!$query1) {
                                die("Database select room fail" . mysql_error());
                            }
                            ?>
                            <?php
                            @session_start();
                            $adult_no = $_POST['adult'];
                            $child_no = $_POST['child'];
                            $date01 = $_POST['in_date'];
                            $date02 = $_POST['out_date'];
                            $check_in_date = date("d-m-Y", strtotime($date01));
                            $check_out_date = date("d-m-Y", strtotime($date02));
                            if ($check_in_date < $check_out_date) {
                                echo '
                            <table border=2 id="overview">
                                <tr id="overview_head">
                                    <th>&nbsp;Room No&nbsp;</th>
                                    <th>&nbsp;Feature of the room&nbsp;</th>
                                    <th>&nbsp;Capacity&nbsp;</th>
                                    <th>&nbsp;Price&nbsp;</th>
                                    <th>&nbsp;Details&nbsp;</th>
                                    <th>&nbsp;Booking&nbsp;</th>
                                </tr> ';
                                while ($row = mysql_fetch_array($query1)) {
                                    if ($row['room_adult'] == $adult_no && $row['room_child'] == $child_no) {
                                        echo '<tr>';
                                        echo '<td >' . $row['room_no'] . '</td>';
                                        echo '<td>' . ' <img src="images/photo/' . $row['room_no'] . '.jpg"' . 'height=100px width=150px/>' . '</td>';
                                        echo '<td >' . 'Adult:' . $row['room_adult'] . "<br/>" . 'Child:' . $row['room_child'] . '</td>';
                                        echo '<td>' . $row['room_price'] . '</td>';
                                        echo '<td class="room_details">';
                                        echo $row['room_category_details'];
                                        echo '</td>';
                                        /* Send Two dates */

                                        $_SESSION['d1'] = $check_in_date . '';
                                        $_SESSION['d2'] = $check_out_date . '';
                                        $_SESSION['room_id'] = $row['room_no'] . '';
                                        if (!empty($_SESSION['type'])) {
                                            if ($_SESSION['type'] == 'user') {
                                                $_SESSION['fsearch']='yes';
                                                echo '<td class="book_button">' .
                                                '<a href="http://localhost/shafiurcse02/user_document_page.php?' . 'id=' . $row['room_no'] . '">Booking</a>' . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            
                                            echo '<td class="book_button">' .
                                            '<a href="http://localhost/shafiurcse02/adservation_form.php?' . 'id=' . $row['room_no'] . '">Booking</a>' . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                }
                            } else {
                                echo 'Please insert correct information';
                                header("Location: http://localhost/shafiurcse02/index.php");
                            }
                            echo '</table>';
                            ?>
                            <?php
                            include 'includes/connection_closed.php';
                            ?>
                        </div>
                    </form>
                    <div id="again_search">
                        <a href="http://localhost/shafiurcse02/index.php" title="Go Home">Again Search</a>
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
    </div>
</body>
