<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Transaction</title>
  <style>
    table,td{
      border: 1px solid black;
      border-collapse: collapse;
    }
    table{
      margin-left: auto; 
      margin-right: auto;
    }
    td{
      width: 200px;
      padding: 0.3em; 
    }
    .respone{
      overflow-x:auto;
    }
    .head{
      text-align: center;
    }
    <?php include"style.php"; ?>
  </style>
  </head>
  <body>
    <?php include"header.php"; ?>
    <h1 class='head'>Transaction Summary</h1>
    <br><br>
  <?php
  include "connect.php";
    $amt = $_POST['amount'];
    $sid = $_POST['sid'];
    $rid = $_POST['tousr'];
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d H:i:s', time () );

    if(isset($_POST['transfer'])){
      $sql = "Select bal from account where id=".$sid;
      $res = mysqli_query($conn, $sql);
      $fbal = mysqli_fetch_assoc($res);
      $fbalance = $fbal['bal'];

      $rsql = "Select bal from account where id=".$rid;
      $tres = mysqli_query($conn, $rsql);
      $tbal = mysqli_fetch_assoc($tres);
      $tbalance = $tbal['bal'];

      //Variable values
      /*echo "From Account = ".$sid;
      echo "<br>";
      echo "From account bal= ".$fbalance;
      echo "<br>";
      echo "Amount entered=".$amt;
      echo "<br>";
      echo "To Account = ".$rid;
      echo "<br>";
      echo "To account bal= ".$tbalance;
      echo "<br>";
      echo $currentTime;*/

      //table
      echo"<div class='respone'><table>";
      echo"<tr>";
        echo"<td>Date</td>";
        echo"<td>".$currentTime."</td>";
      echo"</tr><tr>";
        echo"<td>From</td>";
        echo"<td>".$sid."</td>";
      echo"</tr><tr>";
        echo"<td>To</td>";
        echo"<td>".$rid."</td>";
      echo"</tr><tr>";
        echo"<td>Amount ₹</td>";
        echo"<td>".$amt."/-</td>";
      echo"</tr>";

      //code 
      if($amt<=$fbalance)
      {
        $fbalance = $fbalance - $amt;
        $tsql = "UPDATE account SET bal= $fbalance WHERE id = $sid";

        $conn->query($tsql);
        $tbalance = $tbalance + $amt;
        $gsql = "UPDATE account SET bal= $tbalance WHERE id = $rid";

        $conn->query($gsql);
        $stsql = "INSERT INTO transaction VALUES ('$currentTime',$sid,$rid,$amt,'SUCCESS')";
        $conn->query($stsql);
        echo"<tr>";
        echo"<td>Status</td>";
        echo"<td>SUCCESS</td>";
      echo"</tr></table> </div>";
      }
      else
      {
        $stsql = "INSERT INTO transaction VALUES ('$currentTime',$sid,$rid,$amt,'FAILED')";
        $conn->query($stsql);
        echo"<tr>";
        echo"<td>Status</td>";
        echo"<td>FAILED</td>";
      echo"</tr></table> </div>";
      }
    }
    $conn -> close();
?>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        window.alert("Do not refresh or go back while the transaction is being processed");
    }
  </script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>