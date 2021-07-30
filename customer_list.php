<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>
    Customer Details</title>
    <style> .rform input[type=submit]
        {
            height: 30px;
            width: 600px;
            background: rgba(0,0,0,0.5);
        }
        .rfor{
            color:forestgreen;
            top: 30%;
            left: 60%;
            background-size:a;
        }
    </style>
    </head>
    <body>
     <?php
        $rid=$_SESSION['Rid'];
        $conn=mysqli_connect('localhost','root','','resto avail');
        $query="SELECT * FROM users WHERE rid='$rid'";
        $res=mysqli_query($conn,$query);
//        if($res)
//            echo 'succ';
    ?>
        <div class='rform'>
        <form method="post" action='customer_list.php'>
        <?php while($row=$res->fetch_assoc())
          {?>
        <div class="rfor"><p>Name : <?=$row['Name']?><br>
            Phone Number:<?=$row['Phone Number']?></p></div>
            <input type='submit' formaction="" value ="CHECK DETAILS" name="<?= $row['Phone Number'];?>">
            <?php }?>
        </form>
            <?php
            $phoned='';
            $cname='';
              foreach($res as $r)
              {
                  if(isset($_POST[$r['Phone Number']]))
                  {
                      $phoned=$r['Phone Number'];
                      $cname=$r['Name'];
                      echo $cname;
                  }
              }
           $_SESSION['phoned']=$phoned;
           $_SESSION['cname']=$cname;
           if($cname!='')
           {
               header('location:details.php');
           }
          ?>
        </div>
    </body>
</html>