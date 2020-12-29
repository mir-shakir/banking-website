<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer list</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/banking.css">
  </head>
  <body class='body1'>
    <?php
    require 'config.php';
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if(!$conn){
    	 die("connection failed".mysqli_connect_error());
     }
     $sql="SELECT id , name FROM customer";
     $result=mysqli_query($conn,$sql);
     if(!$result){

       die( "connection error:".mysqli_error($conn));

     }
     echo "<div class='container title1'><h2 id='note'>Select Sender</h2></div>";

    echo "<div class='table1'><table class='table'>
        <thead scope='row' class='thead1'><td class=''>Customer ID</td><td class=''>NAME OF CUSTOMER</td></thead>
    ";

     while ($row = mysqli_fetch_array($result)) {
    // Do something with $row

    echo "<tr scope='row'>";
    echo "<td class='col1'>".$row['id']."</td>";
    echo "<td class=''>"."<a href='scripts/view.php?selected=".$row['id']."'>".$row['name']."</a>"."</td>";
    echo "</tr>";
    }
    echo "</table></div>";
    mysqli_close($conn);
     ?>

  </body>
</html>
