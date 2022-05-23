<?php
include('header2.php');
include ('session.php');

$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
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
                <section class="main">
                    <div class="custom-calendar-wrap">
                        <div id="custom-inner" class="custom-inner">
                            <div class="custom-header clearfix">
                                <nav>
                                    <span id="custom-prev" class="custom-prev"></span>
                                    <span id="custom-next" class="custom-next"></span>
                                </nav>
                                <h2 id="custom-month" class="custom-month"></h2>
                                <h3 id="custom-year" class="custom-year"></h3>
                            </div>
                            <div id="calendar" class="fc-calendar-container"></div>
                        </div>
                    </div>
                </section>
                        
                        <img src="admin/images/banner2.png" width="780" />


            </div>

        </div>
    </div>
</div>
</div>






</body>
</html>


