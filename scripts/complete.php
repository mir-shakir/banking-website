<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transacton success</title>
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
     $cont=mysqli_connect($servername,$username,$password,$dbname);
     if(!$cont){
       die("connection failed".mysqli_connect_error());
     }
     $r_id=$_REQUEST["r_id"];
     $s_id=$_REQUEST["s_id"];
     $amt=$_REQUEST["amt"];
     $r_bal=$_REQUEST["r_bal"]+$amt;
     $s_bal=$_REQUEST["s_bal"]-$amt;
     $sql="UPDATE customer SET balance=$s_bal WHERE id=$s_id";
     $sql1="UPDATE customer SET balance=$r_bal WHERE id=$r_id";
     $sqlt="INSERT INTO transfers(s_id,r_id,amount) VALUES ($s_id,$r_id,$amt)";
     $result=mysqli_query($conn,$sql);
     $result1=mysqli_query($conn,$sql1);
     $result2=mysqli_query($cont,$sqlt);
     if(!$result || !$result1 || !$result2){
       die( "sql error:".mysqli_error($conn));
     }
     echo "<div class='margin1 display-3 font-weight-light'>Transacton Successful</div><br>
      <div class='margin1 display-4'>Redirecting to home page!!!</div>";
     ?>
     <script type="text/javascript">
       function redirect(){
         setTimeout(function(){window.location='../banking.html'}, 3000)
       }
       window.redirect();
     </script>

  </body>
</html>
