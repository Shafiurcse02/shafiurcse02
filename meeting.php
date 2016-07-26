<?php
@session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome to JNU Hotel</title>
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
        ?>
        <!--end header -->


        <!--start mainbody -->
        <div class="mainbody">
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="#" method="post" id="onlinebooking">
                        <?php
                        include 'includes/mettingside.php';
                        ?>
                    </form>
                    <?php
                    include 'includes/email_page.php';
                    ?>
                </div>
                <!--end left -->
                <!--start right -->
                <div class="right">
                    <b>meetings and events</b>
                    <span class="arrow-left" id="arrow-left"><a href="#"></a></span>
                    <span class="arrow-right" id="arrow-right"><a href="#"></a></span>
                    <span id="grb">			
                        <img src="uploaded_images/h6.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h7.jpg" alt="banner"  width="96%" height="270"/>
                        <img src="uploaded_images/h8.jpg" alt="banner"  width="96%" height="270"/>
                    </span>			
                    <p>JNU Hotel has a range of conference, meetings, exhibition and banquet facilities to organize small meetings to international seminars or private dinners to lavish weddings. These facilities vary from our two large venues &ndash; The Winter Garden and The Grand Ballroom ideal for conference, exhibition, fair, etc. On top of that we have seven multi-functional meeting rooms &ndash; Bakul, Chameli, Palash, Shimul, Marble Room, Top of the Park including one prestigious board room Dalia.</p>          
                    <!--			<h4 class="welcome">Restaurants & lounges</h4>
                    -->			
                    <div class="list">
                        <h4 class="restaurants">BANQUET FEATURES</h4>
                        <ul>
                            <li>Internet service (charge applicable)</li>
                            <li>Video conferencing service</li>
                            <li>Conference microphone(s)</li>
                            <li>LCD Projector</li>
                            <li>Audio Visual equipment</li>
                        </ul>
                    </div>


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
