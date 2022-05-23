<?php
include('header.php');

unset($_SESSION['id']);
?>
<body>

<center>

    <div class="row-fluid">
        <div class="span12">



            <div class="container">
                <div class="row-fluid">
                       <div class="span12">

                    <div class="span12">
                     <br><br><br><br><br><br><br><br>

                        <div class="alert alert-info">Please Admin Username and Password to <strong>Login</strong></div>

                        <form class="form-vertical" method="post">

                            <div class="control-group">
                                <label  for="inputEmail"><strong>Admin Username</strong></label>
                                <div class="controls">
                                    <input type="text" name="username" id="inputEmail" placeholder="Username" required>
                                </div>

                            <div class="control-group">
                                <label  for="inputPassword"><strong>Admin Password</strong></label>
                                <div class="controls">
                                    <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="login" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                                </div>
                                <br>
                                <?php

                                if (isset($_POST['login'])) {

                                    function clean($str) {
                                        global $conn;
                                        $str = @trim($str);
                                        $str = stripslashes($str);
                                        return mysqli_real_escape_string($conn,$str);
                                    }

                                    $username = clean($_POST['username']);
                                    $password = clean($_POST['password']);

                                    $query = mysqli_query($conn,"select * from user where username='$username' and password='$password'") or die(mysqli_error());
                                    $count = mysqli_num_rows($query);
                                    $row = mysqli_fetch_array($query);


                                    if ($count > 0) {
                                       
                                        $_SESSION['id'] = $row['user_id'];
                                        echo('<script>location.href = "home.php"</script>');
                                        session_write_close();
                                        exit();
                                    } else {
                                        session_write_close();
                                        ?>

                                     
                                        <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>

                                        <?php
                                      
                                    }
                                }
                                ?>
                            </div>
                

                    </form>
                </div>

            </div>
      
        </div>
    </div>

</div>

</center>






</body>
</html>


