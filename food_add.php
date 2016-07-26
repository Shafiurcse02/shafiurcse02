<?php
@session_start();
include_once 'includes/connection.php';
$ID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if ($type != 'admin') {
    $_SESSION['type'] = NULL;
    header("Location: http://localhost/shafiurcse02/index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administrator Food Page of JNU Hotel</title>

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
        if (!empty($_SESSION['type']) && $_SESSION['type'] != NULL) {
            if ($_SESSION['type'] == 'user') {
                header("Location:http://localhost/shafiurcse02/user_document_page.php");
            } if ($_SESSION['type'] == 'admin') {
                include 'includes/header_login/header_admin.php';
            }
        } else {
            $_SESSION['type'] = NULL;
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
                <div class="admin_page_right">
                    <div class="admin_page_2nddiv_main">

                        <!--<div id="admin_page_first">
                       </div>
                       <div id="admin_page_second">
                       </div>-->
                        <div id="admin_page_first"><br/>
                            <div id="admin_page_first_head">
                                <h1>JNU Hotel</h1>
                                <p> House 35/g,Road 10/a,JNU,Dhaka-1100</p>
                                <p> Phone:+088-0100012,01723-506770.</p>
                            </div> <br/>
                            <br/>
                            <div id="admin_page_first_output">

                                <?php
                                $Result = mysql_query(
                                        "select * from `data_jnu_hotel_13`.`user` 
                                        where `user_id`='$ID';");
                                if (!$Result)
                                    echo mysql_error();
                                else {
                                    $row3 = mysql_fetch_array($Result);
                                    $admin_log_name = $row3['name'];
                                    echo '<p><p id="Administrator_text">Administrator Name :<p/> 
                                            <p id="Administrator_Name">' . $admin_log_name . '<p/><p/>';
                                }
                                echo '<br/>';
                                /* Inser room of JNU.hotel */
                                if (!empty($_SESSION['double_food']))
                                    if (($_SESSION['double_food']) != 'no') {
                                        echo '<p id="admin_double_room">' . 'Food already has been' . '<p/>';
                                    }
                                if (isset($_POST['admin_food_no'])  && isset($_POST['admin_food_cost'])) {
                                    $admin_food_no = $_POST['admin_food_no'];
                                    $admin_food_cost = $_POST['admin_food_cost'];
                                    if (!empty($admin_food_no)  && !empty($admin_food_cost)) {
                                        $query1 = mysql_query("select *
    from `data_jnu_hotel_13`.food");

                                        while ($row = mysql_fetch_array($query1)) {
                                            if ($row['food_name'] == $admin_food_no) {
                                                $_SESSION['double_food'] = 'yes';
                                                ob_clean();
                                                header("Location: http://localhost/shafiurcse02/food_add.php");
                                                exit();
                                            }
                                            $_SESSION['double_food'] = 'no';
                                        }
                                        $_SESSION['double_food'] = 'no';
                                        $admin_food_insert_quiry_food = mysql_query("INSERT INTO `data_jnu_hotel_13`.`food`(`food_name`, `price`)
                                                    VALUES ('$admin_food_no','$admin_food_cost');");
                                        $admin_food_select_quiry_food = mysql_query(
                                                "SELECT `food_id`, `food_name`, `price`
                                                        FROM `food` 
                                                        WHERE `food_name`='$admin_food_no'");
                                        if (!$admin_food_select_quiry_food) {
                                            echo mysql_errno();
                                        } else {
                                            $row = mysql_fetch_array($admin_food_select_quiry_food);
                                            $food_id_for_category = $row['food_name'];
                                        }
                                        if ($admin_food_insert_quiry_food)
                                            echo '<p id="admin_work_output">' . 'Insert the food Name :<p/><p id="admin_work_output2">' . $admin_food_no . '<p/><br/>';
                                        else {
                                            echo 'Sorry to insertion food'.$admin_food_cost.$admin_food_no . mysql_error();
                                        }
                                    }
                                }
                                /* fOOD Detelte */
                                if (isset($_POST['admin_food_delete_id'])) {
                                    $admin_delete_food1 = $_POST['admin_food_delete_id'];
                                    if (!empty($admin_delete_food1)) {
                                        $admin_select_delete_food = mysql_query(
                                                "SELECT `food_id`, `food_name`, `price` FROM `food` 
                                                        WHERE `food_name`='$admin_delete_food1'");
                                        if (!$admin_select_delete_food) {
                                            echo mysql_errno();
                                        } else {
                                            $row = mysql_fetch_array($admin_select_delete_food);
                                            $food_id_category = $row['food_name'];
                                            $quiry_delete_category_id = mysql_query("
                                                     DELETE FROM `data_jnu_hotel_13`.`food` 
                                                    WHERE  `food`.`food_name` = '$food_id_category'");
                                            if ($food_id_category) {
                                                if ($quiry_delete_category_id) {
                                                    $quiry_food_delete = mysql_query("
                                               DELETE FROM `data_jnu_hotel_13`.`food` 
                                               WHERE `food`.`food_name` = '$food_id_category'
                                                                ");
                                                    if ($quiry_food_delete) {
                                                        echo '<p id="admin_work_output">' .
                                                        'Deleted food Name is:<p/><p id="admin_work_output2">' .
                                                        $admin_delete_food1 . '<p/>';
                                                        $admin_delete_food1 = '';
                                                    }
                                                }
                                            } else {
                                                echo '<p id="admin_work_output">' . 'Food Does not found' . '<p/>';
                                            }
                                        }
                                    }
                                }
                                ?>
                                </p>
                            </div>
                            <h3>Food Insertion</h3>
                            <form action="food_add.php" method="POST">
                                <table id="admin_page_first_table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/food_name.png" width="120" height="18"></td>
                                        <td><input type="text" name="admin_food_no" maxlength="9" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/food_price.png" width="120" height="18"></td>
                                        <td><input type="number" name="admin_food_cost" maxlength="4" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="reset" value="reset"></td>
                                        <td  align="right"><input type="submit" name="admin_food_insert" title="insert Room" value=" Press "></td>
                                    </tr>
                                </table>
                            </form>
                            <h2> Food Delete </h2>
                            <form action="food_add.php" method="POST">
                                <table id="admin_page_first_table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><img src="images/food_name.png" width="100" height="17"></td>
<!--                                        <td><input type="text" name="admin_room_delete_id" maxlength="9"/></td>-->
                                        <td>
                                            <select name="admin_food_delete_id">
                                                <?php
                                                $Result = mysql_query(
                                                        "SELECT  `food_name` FROM `food` WHERE 1");
                                                if (!$Result)
                                                    echo mysql_error();
                                                else {
                                                    while ($row = mysql_fetch_array($Result)) {
                                                        $row = array_unique($row);
                                                        foreach ($row as $value) {
                                                            echo '<option value=' . $value . '>' . $value . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="reset" value="reset"></td>
                                        <td align="right"><input type="submit" name="admin_room_insert" title="Delete Room" value=" Press "></td>
                                    </tr>
                                </table>
                            </form>

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
        <?php
        include_once 'includes/connection_closed.php';
        ?></div>
</body>
