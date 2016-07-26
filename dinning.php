<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Dinning room to JNU Hotel</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="index.js"></script>
    </head>

    <body>

        <div class="wraper">       
            <?php
            include 'includes/header.php';
            ?>
            <!--end header -->
            <!--start mainbody -->
            <div class="mainbody">
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
                        <b>DINING</b>

                        <span id="grb">
                            <img src="uploaded_images/h9.jpg" alt="banner"  width="97%" height="270"/>
                        </span>			
                        <p>Delight yourself with the best local and international cuisine at JNU Hotel.</p>
                        <p>&nbsp;</p>
                        <p>Dhaka&rsquo;s most elegant restaurant &ndash; the Vintage Restaurant offers semi-formal dining in stylish vintage surroundings. A menu of imported beef, poultry and sea-food is complemented by a selection of fine wines.</p>
                        <p>&nbsp;</p>
                        <p>Stop by the bar to catch up with friends for live entertainment. There is a wide selection of international beers, wines and spirits. There is also a big screen to watch sport events. It&rsquo;s the perfect place to unwind after a long day.</p>
                        <p>&nbsp;</p>
                        <p>Our Executive Club Lounge offers daily complimentary breakfast, bottomless tea or coffee with assorted cookies throughout the day, complimentary snacks during lunch and complimentary evening cocktails during Happy Hour. Enjoy all these benefits in a WIFI surrounding with a big screen television and relax in the most sophisticated lounge of the city.</p>			


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
        <!--end wraper -->
    </body>
</html>
