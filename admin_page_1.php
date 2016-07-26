
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administrator Page of JNU Hotel</title>

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
                        <center>Administrator Page </center>
                        <?php
                        $resist_name = $_POST['ad_name'];
                        $resist_passwor = $_POST['ad_pwd'];
                        if ($resist_name = 'shafiur' && $resist_passwor = '123') {
                            echo '<h5 align="center">' . $_POST['ad_name'] . '</h5>';
                        }
                        else
                            echo 'Please insert Currect information';
                        ?>
                        <div id="ad_work_page">
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
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td id="admin_logout">
                                        <a href="http://localhost/shafiurcse02/admin_login.php" title="Logout">Logout</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5" id="delete_bar"> For Delete room</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>Delete Room ID</td>
                                    <td><p>:</p></td>
                                    <td><input type="text" name="ad_delete_room_id" title="Delete room" maxlength="20"/></td>
                                    <td id="delete_sub">
                                        <input type="submit" value="press"  width="40"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5" id="delete_bar1"> For Delete resistration</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>customer Name</td>
                                    <td><p>:</p></td>
                                    <td><input type="tex" name="delete_cust_id" title="customer name" maxlength="25"/></td>
                                    <td id="delete_sub">
                                        <input type="submit" value="press"  width="40"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="6" id="delete_bar"> For insert room</td>
                                </tr>
                                <tr id="insert_tex">
                                    <td>Room ID</td>
                                    <td>&nbsp;&nbsp;<img src="images/adult.png" width="60" height="20"></td>
                                   <td>&nbsp;&nbsp;<img src="images/child.png" width="60" height="20"></td>
                                     <td>AC/Non AC</td>
                                    <td>Price</td>

                                </tr>
                                <tr>
                                <tr>
                                    <td><input type="text" name="room_id_insert" title="New Room ID"/>
                                    </td>
                                    <td>
                                         <select name="room_adult_insert">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                         </td>
                                    <td>
                                         <select name="room_child_insert">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    </td>
                                    
                                    <td>
                                        <select name="room_ac_or_nonac_insert">
                                        <option value="AC">AC</option>
                                        <option value="Non AC">Non AC</option>
                                    </select>
                                    </td>
                                    <td>
                                        <input type="text" name="room_taka_insert" title="Price"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" id="insert_button">
                                        <input type="submit" value="Insert"/>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
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
