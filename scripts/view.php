<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/banking.css">
    <script>
    function transfer(id){
      document.getElementById('hide').innerHTML='';

      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){
          document.getElementById('hide').innerHTML=this.responseText;
        }
      };
      xmlhttp.open("GET","transfer.php?q="+id,true);
      xmlhttp.send();
    }
   xmlhttp.send();
    // }
    </script>
  </head>
  <body class='body1'>
    <?php
    require 'config.php';
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if(!$conn){
    	 die("connection failed".mysqli_connect_error());
     }
     $selected=$_REQUEST['selected'];
     $sql="SELECT * FROM customer where id=$selected";
     $result=mysqli_query($conn,$sql);
     if(!$result){

       die( "connection error:".mysqli_error($conn));

     }

     echo "<div id='hide' class='table1 margin1' > <table class='table'>";
     while ($row = mysqli_fetch_array($result)) {
      echo "<tr><td colspan=2><h2 class='title1'>Banking Profile of ".$row['name']."</h2></td></tr>";
      echo "<tr><td>Id:</td> <td>".$row['id']."</td></tr><br>";
      echo "<tr><td>Name: </td><td>".$row['name']."</td></br></tr>";
      echo "<tr><td>Email: </td><td>".$row['email']."</td></br></tr>";
      echo "<tr><td>Phone No.: </td><td>".$row['phone_no']."</td></br></tr>";
      echo "<tr><td>Balance: </td><td>".$row['balance']."</td></br></tr></table>";
      $id=$row['id'];
    }
    mysqli_close($conn);
    echo "
      <div>
      <form class='' action='' method='post'>
        <input type='button' id='btn_id' value='Transfer Money' class=' bg-primary btn-lg gentle-flex' onclick=transfer(".$id.")>
      </form>

      </div></div>
      ";
      echo "<p id='itext'></p>";
     ?>
  </body>
</html>
