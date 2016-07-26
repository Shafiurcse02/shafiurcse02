<?php
@session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guest Room ofJNU Hotel</title>
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
                    <b>Photo Gallery </b>
                    <span class="arrow-left" id="arrow-left"><a href="#"></a></span>
                    <span class="arrow-right" id="arrow-right"><a href="#"></a></span>
                    <span id="grb">
                        <img src="uploaded_images/h1.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h2.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h3.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h4.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h5.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="images/photo/D04002.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="images/photo/D04003.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="images/photo/D04004.jpg" alt="banner"  width="96%" height="270"/>

                    </span>

                    <p>Welcome! Make yourself comfortable and relax.</p>			
                    <div class="list">

                        <h3>ENTERTAINMENT</h3>
                        <ul>
                            <li>Satellite Television Channels</li>
                            <li>LCD / LED Televisions</li>
                        </ul>
                        <h3>SAFETY FEATURES</h3>
                        <ul>
                            <li>Fire alarm in the floors</li>
                            <li>Smoke detectors</li>
                            <li>Sprinklers</li>
                            <li>Electronic lock</li>
                        </ul>
                    </div>
                    <p>Some of the amenities above mayrerer not be</br> 
                        available in all rooms. Additional charges on certain amenities may apply.</p>		
                    <p>Some of the amenities above mayrerer not be</br> 
                        available in all rooms. Additional charges on certain amenities may apply.</p>	
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
