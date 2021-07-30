<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>BILLING AND RATING</title>
    </head>
    <body>
        <?php
            $phone=$_SESSION['Phone'];
            $conn=mysqli_connect('localhost','root','','resto avail');
            $query="SELECT * from oit WHERE phone=$phone";
            $result=mysqli_query($conn,$query);
        ?>
        
  
            <table border=1px solid>
            <tr>
                 <th colspan=3>ORDERED ITEMS<br></th></tr>
                <tr>
                <td>Item Name</td>
                <td>Qunatity</td>
                <td>Cost</td></tr>
                
        <?php
                 foreach($result as $row)
                 {
                     ?>
                
                    <tr>
                        <td> <?php echo $row['Item_name']?></td>
                        <td><?php echo $row['quant']?> </td>
                        <td><?php echo $row['quant']*$row['Item_cost']?></td>
                    </tr>
                 
        <?php }?>
                <tr>
                <th colspan="3"> BILL AMOUNT: <?php echo $_SESSION['bill']?></th></tr>
                
         </table>  
        <strong>RATING (OUT OF 5)</strong><br>
        <form method='post' action='billing.php' >
            1 <input type='radio' name='Rating' value='1'  >
            2 <input type='radio' name='Rating' value='2'>
            3 <input type='radio' name='Rating' value='3'>
            4 <input type='radio' name='Rating' value='4'>
            5 <input type='radio' name='Rating' value='5'>
            <input type='submit' value='submit' name='sub'>
        </form>
        <?php
        $rid=$_SESSION['Rid'];
        $rname=$_SESSION['RNAME'];
        $phone=$_SESSION['Phone'];
        $rating=0;
        if(isset($_POST['Rating']))
        {
            $rating=$_POST['Rating'];
        }
        $query="UPDATE restaurents SET Rating=(Rating+$rating)/2 WHERE Restaurent_Id='$rid'";
        $r=mysqli_query($conn,$query);
        $que="INSERT INTO rating VALUES($phone,'$rid','$rname',$rating)";
        $t=mysqli_query($conn,$que);
        
        ?>
        <?php
        if(isset($_POST['sub']))
        {
            $quer="UPDATE restaurents SET TABLES_AVAILABE=TABLES_AVAILABE+1 WHERE Restaurent_Id='$rid'";
            $s=mysqli_query($conn,$quer);
        }
        ?>
        
    </body>
</html>
