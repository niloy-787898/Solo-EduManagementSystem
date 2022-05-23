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

                    <a href="subject.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                    <br><br>

                    </div>

                    <div class="span9">

                                    <div class="thumbnail">
                                        <div class="alert alert-info">&nbsp;Add Subject</div>
                                        <?php 
                                        if(isset($_GET['id'])){
                                            $subject = mysqli_query($conn, "SELECT * FROM subject where subject_id = {$_GET['id']}");
                                            foreach(mysqli_fetch_array($subject) as $k => $v){
                                                $$k = $v;
                                            }
                                        }
                                        ?>
                                        <form class="form-horizontal" method="POST">

                                            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Code:</label>
                                                <div class="controls">
                                                    <input type="text" name="sc" id="inputPassword" placeholder="Subject Code" required value="<?php echo isset($subject_code) ? $subject_code : "" ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="st" id="inputPassword" placeholder="Subject Title" required value="<?php echo isset($subject_title) ? $subject_title : "" ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Cateogry:</label>
                                                <div class="controls">
                                                 
                                                    <select name="c" required>
                                                        <option></option>
                                                        <option <?php echo isset($category) && $category == "Major" ? 'selected' : ''  ?>>Major</option>
                                                        <option <?php echo isset($category) && $category == "Minor" ? 'selected' : ''  ?>>Minor</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Subject</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $sc = $_POST['sc'];
                                            $st = $_POST['st'];
                                            $category = $_POST['c'];


                                            if(empty($_POST['id']))
                                            mysqli_query($conn,"insert into subject (subject_code,subject_title,category) values ('$sc','$st','$category')") or die(mysqli_error());
                                            else
                                            mysqli_query($conn,"UPDATE subject set subject_code = '$sc',subject_title ='$st' ,category = '$category' where subject_id = {$_POST['id']}") or die(mysqli_error());

                                            echo('<script>location.href = "subject.php"</script>');
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


