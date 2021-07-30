<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Owner Login - Resto Avail</title>    
</head>
    <body>
    <form action="owner.php" method=post>
        <h3>Welcome</h3>
        <p>Restaurent ID</p>
        <input type="text" name ='1' placeholder="RID" required><br>
        <p>Password</p>
        <input type='password' name='2' placeholder="Password" required><br>
        <input type='submit' name='3'>
        </form>
        <?php
        $rid='';
        if(isset($_POST['1']))
            $rid=$_POST['1'];
        $_SESSION['Rid']=$rid;
        //echo $_SESSION['Rid'];
        $conn=mysqli_connect('localhost','root','','resto avail');
        $sql="SELECT password FROM owner WHERE Rid ='".$_SESSION['Rid']."'";
        $data=mysqli_query($conn,$sql);
//        if($data)
//            echo 'h';
//        else
//            echo'f';
        foreach($data as $t)
            $pass=$t['password'];
        $pass2=$_POST['2'];
        if($pass==$pass2&&isset($_POST["3"]))
        {
            header('location:customer_list.php');
        }
        else
        {
            print("Please Eneter valid password");
        }
        ?>
    </body>
</html>