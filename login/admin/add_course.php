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

                    <a href="course.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                    <br><br>

                    </div>

                    <div class="span9">

                                    <div class="thumbnail">
                                        <div class="alert alert-info">&nbsp;Add Course</div>
                                        <?php 
                                        if(isset($_GET['id'])){
                                            $course = mysqli_query($conn, "SELECT * FROM course where course_id = {$_GET['id']}");
                                            foreach(mysqli_fetch_array($course) as $k => $v){
                                                $$k = $v;
                                            }
                                        }
                                        ?>
                                        <form class="form-horizontal" method="POST">

                                            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Course Year:</label>
                                                <div class="controls">
                                                    <input type="text" name="cc" id="inputPassword" value = "<?php echo isset($cys) ? $cys : '' ?>" placeholder="Course Year" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Department:</label>
                                                <div class="controls">
            
                                                    <select name="cd" required>
                                                        <option><?php echo isset($department) ? $department : '' ?></option>
                                                        <?php 
                                                        $query=mysqli_query($conn,"select * from department");
                                                        while($row=mysqli_fetch_array($query)){
                                                            ?>
                                                        <option><?php echo $row['department']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Major:</label>
                                                <div class="controls">
                                                    <input type="text" name="major" id="inputPassword" value = "<?php echo isset($major) ? $major : '' ?>" placeholder="Major">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $cc = $_POST['cc'];
                                            $cd = $_POST['cd'];
                                            $major = $_POST['major'];


                                            if(empty($_POST['id']))
                                            mysqli_query($conn,"insert into course (cys,department,major) values ('$cc','$cd','$major')") or die(mysqli_error());
                                            else
                                            mysqli_query($conn,"UPDATE course set cys = '$cc',department ='$cd' ,major = '$major' where course_id = {$_POST['id']}") or die(mysqli_error());
                                            echo('<script>location.href = "course.php"</script>');
                                        }
                                        ?>

                                    </div>

                        

                    </div>
                </div>


            </div>
        </div>
    </div>




</body>
</html>


