<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transaction page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/banking.css">
  </head>
  <body class='body1'>
    <?php
    require 'config.php';
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if(!$conn){
    	 die("connection failed".mysqli_connect_error());
     }
     $s_id=$_REQUEST['from'];
     $r_id=$_REQUEST['to'];
     $sql="SELECT name,balance FROM customer where id=$s_id";
     $sql1="SELECT name,balance FROM customer where id=$r_id";
     $result=mysqli_query($conn,$sql);
     if(!$result){

       die( "connection error:".mysqli_error($conn));
     }
     while ($row = mysqli_fetch_array($result)) {
      $sender=$row['name'];
      $s_bal=$row['balance'];
    }


    $result1=mysqli_query($conn,$sql1);
    if(!$result1){

      die( "connection error:".mysqli_error($conn));
    }
    while ($row = mysqli_fetch_array($result1)) {
     $reciever=$row['name'];
     $r_bal=$row['balance'];
   }
   echo "<div class='margin1'><h3 class='padding1'>SENDER &nbsp;&nbsp; : &nbsp;&nbsp;".$sender."</h3><h3 class='padding1' >BALANCE&nbsp;&nbsp;: &nbsp;".$s_bal."</h3>
   <h3 class='padding1'>RECIEVER &nbsp;:&nbsp; ".$reciever."</h3></div>";
   ?>

    <form class=' margin1' action="complete.php" method='post'>
      <input type="hidden" name="s_id" value=<?php echo $_REQUEST['from']; ?>>
      <input type="hidden" name="r_id" value=<?php echo $_REQUEST['to']; ?>>
      <input type="hidden" name="s_bal" value=<?php echo $s_bal; ?>>
      <input type="hidden" name="r_bal" value=<?php echo $r_bal; ?>>
      <label for='amt' class='label1'><h3 class='margin2'>Enter amount</h3></label>
      <input type='number' name='amt' id='amt'class='form-control margin2 input1' max=<?php echo $s_bal; ?> min=0 required=true>
      <input type="submit" name="" class='btn btn-primary margin2' value="Proceed" >
    </form>
    <div class="" id="fail">
    </div>
  </body>
</html>
