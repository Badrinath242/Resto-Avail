<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>
    <title>
        Slot Booking
    </title>
        <style>
         body{
           background-image: url(144-1449758_clock-hands-clipart-hd-png-download.png);
           background-size:cover; 
           font-family: sans-serif;
             background-repeat: no-repeat;
          }</style>
    </head>
    <body>
        <form action='Time.php' method='POST'>
            Entry Time: <input type='time' name='IT' required><br>
            Exit Time: <input type='time' name='IT1' required><br>
            *should be greater than entry time.
            <input type='submit' name='s'>
        </form>
       <?php
        $rid='';
//        $ent='';
//        $ext='';
        $conn=mysqli_connect('localhost','root','','resto avail');
        $rid=$_SESSION['Rid'];
        $phone=$_SESSION['Phone'];
        $Name=$_SESSION['Username'];
        $Age=$_SESSION['Age'];
        $Email=$_SESSION['Email'];
//        echo $rid;
        $sql="INSERT INTO users VALUES($phone,'$Name',$Age,'$Email','$rid')";
        $result=mysqli_query($conn,$sql);
        if(isset($_POST['IT']))
        {
            $ent=$_POST['IT'];
        }
        if(isset($_POST['IT1']))
        {
            $ext=$_POST['IT1'];
        }
        
        if(isset($ent))
        {
            $query="INSERT INTO time_slot values('$rid',$phone,'$ent','$ext')";
            $e=mysqli_query($conn,$query);
            
        }
        if(isset($ent))
        {
            $quer="UPDATE restaurents SET TABLES_AVAILABE=TABLES_AVAILABE-1 WHERE Restaurent_Id='$rid'";
            $s=mysqli_query($conn,$quer);
//            if($s)
//                echo'succ';
//            else
//                echo 'fail';
        }
        ?>
        <?php
        if(isset($_POST['s']))
        {
            header('location:menu.php');
        }
        ?>
    </body>
   
</html>