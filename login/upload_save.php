<?php

include('session.php');

require("opener_db.php");
$errmsg_arr = array();

$errflag = false;
$conn = $connector->DbConnector();

$id_class=$_POST['id_class'];
$name=$_POST['name'];
$test=$_POST['test'];
$assingment=$_POST['assingment'];
$marks=$_POST['marks'];

function clean($str) {
     global $conn;
    $str = @trim($str);
        $str = stripslashes($str);
    return mysqli_real_escape_string($conn,$str);
}


$filedesc = clean($_POST['desc']);


if ($filedesc == '') {
    $errmsg_arr[] = ' file discription is missing';
    $errflag = true;
}

if ($_FILES['uploaded_file']['size'] >= 1048576 * 50) {
    $errmsg_arr[] = 'file selected exceeds 5MB size limit';
    $errflag = true;
}



if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    echo("</script>location.href = 'teacher_class.php'</script>");
    exit();
}

$rd2 = mt_rand(1000, 9999) . "_File";


if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {

    $filename = basename($_FILES['uploaded_file']['name']);

    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {


        $newname = "uploads/" . $rd2 . "_" . $filename;

        if (!file_exists($newname)) {

            if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {


                $qry2 = "INSERT INTO files (fdesc,floc,fdatein,teacher_id,class_id,fname,ftest,fassingment,fmarks) VALUES ('$filedesc','$newname',NOW(),'$session_id','$id_class','$name','$test','$assingment','$marks')";

                $result2 = $connector->query($qry2);
                if ($result2) {
                    $errmsg_arr[] = 'record was saved in the database and the file was uploaded';
                    $errflag = true;
                    if ($errflag) {
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close();
                        ?>

                        <script type="text/javascript">
                          window.location="class.php<?php echo '?id='.$id_class; ?>";                          
                        </script>
                        <?php

                        exit();
                    }
                } else {
                    $errmsg_arr[] = 'record was not saved in the database but file was uploaded';
                    $errflag = true;
                    if ($errflag) {
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close();
                        header("<script>location.href = 'teacher_class.php'</script>");
                        exit();
                    }
                }
            } else {


                $errmsg_arr[] = 'upload of file ' . $filename . ' was unsuccessful';
                $errflag = true;
                if ($errflag) {
                    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    header("<script>location.href = 'teacher_class.php'</script>");
                    exit();
                }
            }
        } else {


            $errmsg_arr[] = 'Error: File >>' . $_FILES["uploaded_file"]["name"] . '<< already exists';
            $errflag = true;
            if ($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("<script>location.href = 'teacher_class.php'</script>");
                exit();
            }
        }
    } else {


        $errmsg_arr[] = 'Error: All file types except .exe file under 5 Mb are not accepted for upload';
        $errflag = true;
        if ($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("<script>location.href = 'teacher_class.php'</script>");
            exit();
        }
    }
} else {


    $errmsg_arr[] = 'Error: No file uploaded';
    $errflag = true;
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("<script>location.href = 'teacher_class.php'</script>");
        exit();
    }
}


mysqli_close();
?>


