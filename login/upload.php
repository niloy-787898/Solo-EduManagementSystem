<?php

include ('session.php');
include('header2.php');
$get_id=$_GET['id'];
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$course_row = mysqli_fetch_array($course_query);
$get_id = $_GET['id'];
?>
<body>

    <?php include('navhead_user.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">

                <div class="hero-unit-3">
                    <ul class="nav  nav-pills nav-stacked">


                        <li><a href="teacher_home.php"><i class="icon-home icon-large"></i>&nbsp;&nbsp;&nbsp;Home
                            </a></li>

                        <li><a href="teacher_class.php"><i class="icon-list-alt icon-large"></i>&nbsp;&nbsp; Class</a>                
                        </li>

                        <li><a href="teacher_subject.php"><i class="icon-book icon-large"></i>&nbsp;&nbsp; Subject</a>                
                        </li>

                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;&nbsp; Student</a>                
                        </li>

                    </ul>
                </div>
                <br>

            </div>

            <div class="span9">
                <a href="teacher_class.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                <br><br>



                <div class="hero-unit-3">
                    <div class="alert alert-info">
                        <strong>&nbsp;Upload a File</strong>
                    </div>
                    <strong>Subject:&nbsp;<?php echo $course_row['subject_id']; ?></strong>


                    <form class="form-horizontal" action="upload_save.php" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">

                                <input name="uploaded_file" type="file" class="input-xlarge" required/>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Title</label>
                            <div class="controls">
                                <input type="text" name="name"  class="input-xlarge" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Description</label>
                            <div class="controls">
                                <textarea name="desc" cols="" rows="" class="input-xlarge" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Quiz/Leason Test</label>
                            <div class="controls">
                                <input type="text" name="test"  class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Assingment</label>
                            <div class="controls">
                                <input type="text" name="assingment"  class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>






</body>
</html>


