<?php include('header2.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">


            <div class="span3">

                <div class="hero-unit-3">
                    <ul class="nav  nav-pills nav-stacked">


                        <li><a href="home.php"><i class="icon-home icon-large"></i>&nbsp;&nbsp;&nbsp;Home
                            </a></li>

                        <li><a href="file.php" role="button"><i class="icon-folder-open icon-large"></i>&nbsp;&nbsp;File
                            </a></li>

                        <li><a href="course.php"><i class="icon-tag icon-large"></i>&nbsp;&nbsp;Course
                            </a>                
                        </li>

                        <li><a  href="subject.php" role="button"><i class="icon-book icon-large"></i>&nbsp;&nbsp;Subject
                            </a></li>

                        <li><a href="department.php" role="button"><i class="icon-hospital icon-large"></i>&nbsp;&nbsp;Department
                            </a></li>

                        <li><a href="student.php" role="button"><i class="icon-group icon-large"></i>&nbsp;&nbsp;Student
                            </a></li>

                        <li><a href="teacher.php" role="button"><i class="icon-user icon-large"></i>&nbsp;&nbsp;Teacher
                            </a></li>

                        <li><a href="user.php" role="button"><i class="icon-user-md icon-large"></i>&nbsp;&nbsp;User
                            </a></li>

                        <li><a href="logout.php" role="button"><i class="icon-signout icon-large"></i>&nbsp;&nbsp;Logout
                            </a></li>

                    </ul>
                </div>


                <br>

            </div>

                    <div class="span2">

                    <a href="user.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                    <br><br>

                    </div>

                    <div class="span9">

                                    <div class="thumbnail">

                                    <div class="alert alert-info">&nbsp;Add User</div>
                                        <?php 
                                        if(isset($_GET['id'])){
                                            $user = mysqli_query($conn, "SELECT * FROM user where user_id = {$_GET['id']}");
                                            foreach(mysqli_fetch_array($user) as $k => $v){
                                                $$k = $v;
                                            }
                                        }
                                        ?>

                                    <form class="form-horizontal" method="POST">

                                     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">

                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username:</label>
                                            <div class="controls">
                                                <input type="text" name="un" value = "<?php echo isset($username) ? $username : '' ?>" id="inputEmail" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password:</label>
                                            <div class="controls">
                                                <input type="password" name="p" value = "<?php echo isset($password) ? $password : '' ?>" id="inputPassword" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">FirstName:</label>
                                            <div class="controls">
                                                <input type="text" name="fn" value = "<?php echo isset($firstname) ? $firstname : '' ?>" id="inputPassword" placeholder="FirstName" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">LastName:</label>
                                            <div class="controls">
                                                <input type="text" name="ln" value = "<?php echo isset($lastname) ? $lastname : '' ?>" id="inputPassword" placeholder="LastName" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save User</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST['save'])) {

                                        $un = $_POST['un'];
                                        $p = $_POST['p'];
                                        $fn = $_POST['fn'];
                                        $ln = $_POST['ln'];
                                    

                                        if(empty($_POST['id']))
                                        mysqli_query($conn,"insert into user (username,password,firstname,lastname) values ('$un','$p','$fn','$ln')")or die(mysqli_error());
                                        else
                                        mysqli_query($conn,"UPDATE user set username = '$un',password ='$p' ,firstname = '$fn'  ,lastname = '$ln' where user_id = {$_POST['id']}") or die(mysqli_error());
                                        echo('<script>location.href = "user.php"</script>');

                                    }
                                    ?>

                                </div>
                            </li>

                        </ul>
						</div>



                    </div>
                </div>

            </div>
        </div>
    </div>




</body>
</html>


