<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/banking.css">
  </head>
  <body class='body1'>
    <?php
    require 'config.php';
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if(!$conn){
    	 die("connection failed".mysqli_connect_error());
     }
     $id=$_GET["q"];
     $sql="SELECT * FROM customer WHERE id != $id";
     $result=mysqli_query($conn,$sql);
     if(!$result){

       die( "connection error:".mysqli_error($conn));
     }
     echo "<div><h1 class='thead1'>Select a customer as Reciever</h1><br></div>";
     echo "<div class=''><table class='table'>
         <thead scope='row' class='header1'><td class=''>CUSTOMER ID</td><td class=''>NAME OF CUSTOMER</td></thead>
     ";

      while ($row = mysqli_fetch_array($result)) {
     echo "<tr scope='row'>";
     echo "<td class=''>".$row['id']."</td>";
     echo "<td class=''>"."<a href='transaction.php?from=".$id."&& to=".$row['id']."'>".$row['name']."</a>"."</td>";
     echo "</tr>";
     }
     echo "</table></div>";
     ?>
  </body>
</html>
