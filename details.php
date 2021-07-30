<?php
session_start();
$phone=$_SESSION['phoned'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>
    Order Details
    </title></head>
    <body>
           <?php
            $conn=mysqli_connect('localhost','root','','resto avail');
            $query="SELECT * from oit WHERE phone=$phone";
            $result=mysqli_query($conn,$query);
            $q1="SELECT * from time_slot where Phone=$phone";
            $r=mysqli_query($conn,$q1);
        ?>
         
            <p>Check-in Time : 
                <?php
                foreach($r as $t) 
                    echo $t['Entry_Time'];?>
            
        </p> 
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
                </table>
        <br>
        <form method="post" action='details.php'>
        <input type="submit" value='Checked-In' name='1' >    
         <input type='submit' value="Didn't show up" name='2'>
            </form>
        <?php
        if(isset($_POST['1']))
        {
            header('loactaion:suc.php');
        }
        if(isset($_POST['2']))
        {
            header('location:fai.php');
        }
        ?>
    </body>
</html>