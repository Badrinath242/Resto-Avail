<?php
$conn=mysqli_connect('localhost','root','','resto avail');
?>
<!doctype html>
<html>
<head>
<title>
    Welcome to Resto Avail</title>
    <style>
        body
        {
          background-image: url(oie_0okHZaE4v2pB.jpg);
           background-size:cover; 
           font-family: sans-serif;
            background-repeat: no-repeat;
        }
        .rform
        {
             width: 280px;
           position: absolute;
           width: 1350px;
           height: 700px;
           box-sizing: border-box;
           background: rgba(0,0,0,0.5);
           padding: 40px;
        }
        .rform input[type=submit]
        {
            height: 30px;
            width: 600px;
            background: rgba(0,0,0,0.5);
            border:none;
           height:30px;
           outline:none;
           background-color:firebrick;
           cursor: pointer;
           border-radius: 20px;
        }
        .rfor{
            color:bisque;
            top: 30%;
            left: 60%;
            background-size:a;
        }
        
    </style>
</head>
<body>
<?php
    session_start();
    $query="SELECT * FROM RESTAURENTS";
    $result=mysqli_query($conn,$query);
    $n=mysqli_num_rows($result);
    $rid='';
    $rname='';
    ?>
    <div class='rform'>
        <form method="post" action="list.php">
        <?php
            while($row=$result->fetch_assoc())
            {?>
        <div class="rfor"><p> RESTAURENT:<?=$row['Restaurent_Name']?><br> RATING:<?=$row['Rating']?><br>
            PHONE:<?=$row['Phone_Number']?><br>TABLES AVIALABLE:<?=$row['TABLES_AVAILABE']?><br>
            Address:<?=$row['Location']?></p></div>
        <input type='submit'  formaction="" value="ENTER" name="<?= $row['Restaurent_Id']?>">
        <?php }?>
   </form>
    <?php 
        foreach($result as $r)
        {
            
            if(isset($_POST[$r['Restaurent_Id']]))
            {
                $rid=$r['Restaurent_Id'];
                $rname=$r['Restaurent_Name'];
            }
        }
       // echo $rid;
        $_SESSION["Rid"]=$rid;
        $_SESSION['RNAME']=$rname;
        $phone=$_SESSION['Phone'];
//        $q="SELECT Restaurent_Name FROM restaurents where Restaurent_Id='".$rid."'";
//        $r=mysqli_query($conn,$q);
//        $_SESSION["Rname"]=$r;
////        echo $r['Restaurent_Name'];
//        echo $_SESSION["Rname"];
        if($rid!='')
        {
            header('location:Time.php');
        }
//        
//        echo $rid;
    ?>
        </div>
</body>
    </html>