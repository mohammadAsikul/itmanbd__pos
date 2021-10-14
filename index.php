<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | POS</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/logo/favicon.png" type="image/x-icon">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- external css -->
    <link rel="stylesheet" href="./scss/style.css">
    <!-- jQuery local file -->
    <script src="../js/jQuery-min.js"></script>
    <!-- font-awesome js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="wrapper">
        <!-- login -->
        <div id="login" class="login">
            <div class="container">
                <div class="login__container--box">
                    <!-- company name -->
                    <h1>ITMANBD</h1>
                    <!--  php code  -->
                    <?php
                        include './includes/config.php';
                        if (isset($_POST['submit'])){
                            $pos_username = mysqli_real_escape_string($conn, $_POST['username']);
                            $pos_password = mysqli_real_escape_string($conn, md5($_POST['password']));
                            $sql_pos_login = "SELECT * FROM ipos_user WHERE username = '{$pos_username}' AND password = '{$pos_password}'";
                            $query_pos_login = mysqli_query($conn, $sql_pos_login) or die("pos_login page query problem.");
                            if (mysqli_num_rows($query_pos_login) > 0) {
                                while ($row = mysqli_fetch_assoc($query_pos_login)) {
                                    session_start();
                                    $_SESSION['user_id'] = $row['id'];
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['password'] = $row['password'];
                                    $_SESSION['designation'] = $row['designation'];
                                    $_SESSION['user_role'] = $row['user_role'];
                                    $_SESSION['status'] = $row['status'];
                                }
                            header("Location: http://localhost/itmanbd__pos/dashboard/");
                            }else{

                            }
                        }
                    ?>
                    <form class="login__form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <!-- inventory pos -->
                        <h3>Inventory | POS Login</h3>
                        <div class="username_container">
                            <input type="text" name="username" class="username" id="username" placeholder="Username">
                            <!-- icon -->
                            <span class="icons username__icon">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <!-- password -->
                        <div class="password_container">
                            <input type="password" name="password" class="password" id="password" placeholder="Password">
                            <span class="icons password__icon">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <div class="submit">
                            <input type="submit" name="submit" class="submit_btn btn" id="submit" value="Login">
                        </div>
                    </form>
                    <div class="errorMsg" style="margin: 20px 0; font-size: 1.2rem;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
