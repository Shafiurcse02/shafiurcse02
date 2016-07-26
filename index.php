<?php
@session_start();
?>
<title>Welcome to JNU Hotel</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="index.js"></script>
<link href="css/header.css" rel="stylesheet" type="text/css"/>
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
        <!---<div id="basic-modal-content" style="text-align:center">
         <h3 style="margin-bottom:30px">Thank you for your reservation request. We will get back to you ASAP. </h3>      
          </div> ---> 
        <!--start mainbody -->
        <div class="mainbody">
            <!--start banner -->
            <div id="banner">
                <img src="images/p1.jpg" alt="banner" height="250" width="100%"/>
                <img src="images/p2.jpg" alt="banner" height="250" width="100%"/>
                <img src="images/p3.jpg" alt="banner" height="250" width="100%"/>
                <img src="images/p4.jpg" alt="banner" height="250" width="100%"/>
            </div>
            <!--end banner -->
            <!--start mainbody-bottom -->
            <div class="mainbody-bottom">
                <!--start left -->
                <div class="left">
                    <div id="contact_t_head">Online Search</div>
                    <form action="http://localhost/shafiurcse02/required_room.php" method="post" id="onlinebooking">
                        <?php
                        include 'includes/left_search.php';
                        ?>
                    </form>
                    <?php
                    include 'includes/email_page.php';
                    ?>
                </div>
                <!--end left -->
                <!--start right -->
                <div class="right">
                    <b>OVERVIEW</b>
                    <p>The first renowned international five-star hotel in Bangladesh, Jnu Hotel is in the most prestigious location;It is near from Ahshan Monjil, just three kilometers from the downtown business district and near Dhaka&rsquo;s most famous Ramna Park and National Museum. It is also at a convenient location from Prime Minister&rsquo;s Office, Bashundhara City Shopping Center, famous Dhaka University campus ,Jagannath University,Dhaka-1100, and surrounding historical places.</p>
                    <p>&nbsp;</p>
                    <br />
                    <b>ESCAPE TO JNU ...</b>

                    <ul>
                        <li>Savor the best local and international cuisine in Dhaka</li>
                        <li>Citys largest selection of facilities to host conference, meeting, exhibition, banquet event etc.</li>
                        <li>Retreat to the most luxurious and soothing 272 guest rooms</li>
                        <li>Make your stay memorable & relaxing</li>
                        <li>Enjoy the sightseeing and others...</li>
                    </ul>
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
