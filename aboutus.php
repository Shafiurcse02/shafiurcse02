<?php
@session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guest Room ofJNU Hotel</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
     <link type="text/css" rel="stylesheet" href="css/ad_user.css"  />
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


            <!--start mainbody-bottom -->
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="http://localhost/shafiurcse02/required_room.php" method="post" id="onlinebooking">
                        <table width="250" border=0>
                            <tr ><th colspan="2"></th></tr>
                            <tr ><th width="60"><img src="images/chech_in.png" width="60" height="20"></th><td width="60"><input  type="date" name="in_date" size="15" />
                                </td></tr>

                            <tr><th width="60"><img src="images/chech_out.png" width="60" height="20"></th><td><input type="date" name="out_date" size="15" /></td></tr>

                            <tr><th><img src="images/adult.png" width="60" height="20"></th><td>
                                    <select name="adult">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td></tr>
                            <tr><th><img src="images/child.png" width="60" height="20"></th>
                                <td>
                                    <select name="child">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td   colspan="2" align="right"><input type="submit" value="Search" title="Search Hotel24.com" /></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    include 'includes/email_page.php';
                    ?>			
                </div>
                <!--end left -->
                <!--start right -->
                <div class="right">
                    <b>About  us</b>
                    

                     <table border=2 class="right_about">
                                <tr id="overview_head">
                                    <th>&nbsp;Feature of the room&nbsp;</th>
                                    <th>&nbsp;Description&nbsp;</th>
                                </tr> 
                                        <tr>
                                            <td> <img src="images/about_us_p/images1.jpg" height=100px width=150px/>'</td>
                                       
                                        <td id="des">hhhhgfgfdgdfgdfgdfgfdgdfgfdg<br>fggdfgdgdfgfd' . '</td>';

                                        
                                        </tr>
                                        <tr>
                                            <td> <img src="images/about_us_p/images2.jpg" height=100px width=150px/>'</td>
                                       
                                        <td id="des">hhhhgfgfdgdfgdfgdfgfdgdfgfdg<br>fggdfgdgdfgfd' . '</td>';

                                        
                                        </tr>
                                        <tr>
                                            <td> <img src="images/about_us_p/images3.jpg" height=100px width=150px/>'</td>
                                       
                                        <td id="des">hhhhgfgfdgdfgdfg dfgfdgdvgfgfgfgfggfgfgfdg<br>fggdfgdgdfgfd' . '</td>';

                                        
                                        </tr>
                                        <tr>
                                        <td> <img src="images/about_us_p/images2.jpg" height=100px width=150px/>'</td>
                                       
                                        <td id="des">hhhhgfgfdgdfgdfgdfgfdgdfgfdg<br>fggdfgdgdfgfd' . '</td>';

                                        
                                        </tr>
                                         </tr>
                                        <tr>
                                            <td> <img src="images/about_us_p/index.jpg" height=100px width=150px/>'</td>
                                       
                                        <td id="des">hhhhgfgfdgdfgdfgdfgfdgdfgfdg<br>fggdfgdgdfgfd' . '</td>';

                                        
                                        </tr>
                                    
                                
                            </table>

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
