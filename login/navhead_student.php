
            <div class="container">

                <div class="row-fluid">

                    <div class="span12">
                        <div class="row-fluid">
                            <br>

                            <div class="span12">
                                <div class="pull-right">

                                    <?php 
                                    $student_query=mysqli_query($conn,"select * from student where student_id='$session_id'")or die(mysqli_error());
                                    $student_row=  mysqli_fetch_array($student_query);
                                    ?>
                                    
                                     <img  src="admin/<?php echo $student_row['location']; ?>"  class="img img-rounded" id="picture">
                                        &nbsp;
                                    <div class="btn-group">
                                       
                                        <button class="btn btn-info"><i class="icon-group icon-large"></i>&nbsp; <?php echo $user_row['firstname'] . " " . $user_row['lastname']; ?></button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#logout" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                                        </ul>

                                    </div>

                                    <?php include('logout_modal.php') ?>
                                </div>
                            </div>
                            
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

        