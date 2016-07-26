<link href="css/style.css" rel="stylesheet" type="text/css"/>
<?php
@session_start();
?>
<div class="header">
    <div class="header-left"><img src="images/logo.png"  alt="logo" width="90%" height="113" title="Welcome  Hotel" /></a></div>
    <div class="header-right">
        <p>JAGANNATHA UNIVERSITY, Dhaka-1100</p>
        <div class="navigation">
            <ul> 
                <li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/index.php" target="_top" title="Home">Home</a></li>
                <li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/user_document_page.php" title="Profile">Profile</a></li>					
                <!--<li class="photos "><a href="photos.html" title="Photos">PHOTOS</a></li> -->
                <li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/photo_gallery.php" title="photo gallery">photo gallery</a></li> 
                <li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/contact_us.php" title="Contact us">Contact us</a></li>   		
                <li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/user_logout.php" title="logOut ">logout</a></li> 

                <li class="overview selected_ovr"><a href=" http://localhost/shafiurcse02/cust_bill.php" title="Bill">Bill</a></li> 
                    <?php
                    if (!empty($_SESSION['room_no']) && !empty($_SESSION['user_id'])) {
                        echo '<li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/cancel.php" title="cencel">reservation cancel</a></li>';
                        echo '<li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/order.php" title="order">Order food</a></li> ';
                    }  else {
                        echo '<li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/Foods.php" title="cencel">food</a></li>';
                        echo '<li class="overview selected_ovr"><a href="http://localhost/shafiurcse02/meeting.php" title="order">meeting</a></li> ';
                    }  
                    
                    ?>


            </ul> 
        </div>

    </div>

</div>