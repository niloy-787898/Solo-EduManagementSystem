
            <div class="container">

                <div class="row-fluid">

                    <div class="span12">
                        <div class="row-fluid">
                            <br>

                            <div class="span12">
                                <div class="pull-right">                        
                                    <?php 
                                    $user_query=mysqli_query($conn,"select * from user where user_id='$session_id'")or die(mysqli_error());
                                    $row=  mysqli_fetch_array($user_query);
                                    ?>
                                    
                                    <div class="btn-group">
                                       
                                        <button class="btn btn-info"><i class="icon-user-md icon-large"></i>&nbsp; <?php echo $row['firstname']." ".$row['lastname']; ?></button>

                                    </div>

                                </div>
                            </div>
                            
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

        