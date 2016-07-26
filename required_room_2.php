
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
        include 'includes/header.php';
        ?>
        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <!--end left -->

                <!--start right -->
                <div class="search_room_left">
                    <div id="contact">
                        <div id="contact_t_head">Contact:</div>
                        <form action="MAILTO:shafiurcse@yahoo.com" method="post" enctype="text/plain" id="contact_body">
                            Name:<br />
                            <input type="text" name="brouser_name" value="" /><br />
                            E-mail:<br />
                            <input type="email" name="brouser_mail" value="" /><br />
                            Comment:<br />
                            <textarea id="broser_tex_aera" name="broser_tex" maxlength="120">

                            </textarea>
                            <br /><br />
                            <input type="submit" value="Send">
                            <input type="reset" value="Reset">

                        </form>
                    </div>
                    <div id="again_search">
                        <a href="http://localhost/shafiurcse02/index.php" title="Go Home">Again Search</a>
                    </div>
                </div>
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
                            $query1 = mysql_query("select * from room", $connection);

                            if (!$query1) {
                                die("Database select fail" . mysql_error());
                            }
                            ?>
                            <?php echo '
                                
                            <table border="1" id="overview">
                                <tr id="overview_head">
                                    <th>&nbsp;Room No&nbsp;</th>
                                    <th>&nbsp;Feature of the room&nbsp;</th>
                                    <th>&nbsp;Details&nbsp;</th>
                                    <th>&nbsp;Capacity&nbsp;</th>
                                    <th>&nbsp;Price&nbsp;</th>
                                    <th>&nbsp;Booking&nbsp;</th>
                                </tr> ';
                            ?>
                            <?php
                            while ($row = mysql_fetch_array($query1)) {
                                $adult_no = $_POST['adult'];
                                $child_no = $_POST['child'];
                                echo '<tr>';
                                if ($row['room_adult'] == $adult_no && $row['room_child'] == $child_no) {
                                    echo '<td>' . $row['room_no'] . '</td>';
                                    echo '<td>' . ' <img src="images/photo/' . $row['room_no'] . '.jpg"' . ' width=150px/>' . '</td>';
                                    echo '<td>';
                                    $query2 = mysql_query("select *
                                                 from room r,room_category c ,room_category_rel c_r
                                               where  c.room_category_id=c_r.room_category_id AND r.room_id=c_r.room_id", $connection);
                                        
                                    if (!$query2) {
                                        die("Database select fail" . mysql_error());
                                    }
                                    while ($row2 = mysql_fetch_array($query2)) {
                                        echo $row2['room_category_details'];
                                    }
                                    echo '</td>';
                                    echo '<td >' . 'Adult:' . $row['room_adult'] . "<br/>" . 'Child:' . $row['room_child'] . '</td>';
                                    echo '<td>' . $row['room_price'] . '</td>';
                                    echo '<td class="book_button">' .
                                    '<a href="http://localhost/shafiurcse02/adservation_form.php?id=' . $row['room_no'] . '">Booking</a>' . '</td>';
                                    echo '</tr>';
                                }
                            }
                            echo '</table>';
                            ?>
                            <?php
                            include 'includes/connection_closed.php';
                            ?>
                        </div>
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
