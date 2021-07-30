<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>
        Menu List
        </title>
    </head>
    <body>
        <form action='menu.php' method="post">
        <?php 
            $conn=mysqli_connect('localhost','root','','resto avail');
            $menu=" SELECT * FROM `restaurent-menu list` where Restaurent_Id='".$_SESSION['Rid']."'";
            $re=mysqli_query($conn,$menu);
            $m=0;
            while($r=$re->fetch_assoc())
            {
                echo $r['Restaurent_Menu']," ",$r['Price'];
                
            ?>
            <input type='number' name='<?php echo $m;?>' value='0' min=0 max=30>
            <br>
            <?php  $m++;}?>
            <input type='submit' name="sub" onclick="alert('Please check your order')" required>
        </form>
        <?php
        $Phone=$_SESSION['Phone'];
        $rid=$_SESSION['Rid'];
        $name=$_SESSION['RNAME'];
        $bill=0;
        $su=0;
        if(isset($_POST["sub"]))
        {
            $su=$_POST["sub"];
        }
        $menu=" SELECT * FROM `restaurent-menu list` where Restaurent_Id='".$_SESSION['Rid']."'";
         $re=mysqli_query($conn,$menu);
        if(isset($su))
        {
            $i=0;
             foreach($re as $r)
            {
               if(isset($_POST[$i])&&$_POST[$i]>0)
               {
                   $rit=$r['Restaurent_Menu'];
                   $cs=$r['Price'];
                  // echo $r['Restaurent_Menu']," ",$_POST[$i],"<br>";
                   $query="INSERT INTO oit VALUES($Phone,'$rid','$rit',$cs,'$name',$_POST[$i])";
                    $d=mysqli_query($conn,$query);
                   $bill=$bill+$r['Price']*$_POST[$i];
               }
             $i++;}
           
        }
      //  echo 'TOTAL BILL :',$bill;
        $_SESSION['bill']=$bill;
        ?>    
        <?php
         if(isset($_POST['sub']))
        {
            header('location:billing.php');
        }
        ?>
    </body>
</html>
    