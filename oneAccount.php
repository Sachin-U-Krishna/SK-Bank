<?php
include "connect.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>View data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    <?php include"style.php"; ?>
    #cid option{
      text-align: center;
    }
    .table td, .table th{
      width: 100vw;
      text-align: center;
    }
      .table th{
      background-color: darkblue;
      color: mintcream;
    }
      .table td{
      background-color: white;
    }
      .respone{
      overflow-x:auto;
    }
    form{
      margin: 5% auto auto 43%;
    }
    </style>
  </head>
  <body>
    <?php include"header.php"; ?>
    <h1 class='head'>View one Account</h1><br>
    <?php
    $tr="Funds Transfer";
    for($i=111001;$i<=111010;$i++){
        if (isset($_POST[$i]))
        {
            $sql = "Select * from account where id=".$i;
            $result = mysqli_query($conn, $sql);
            goto here;
        }
    }
    here:
    echo "<div class='respone'>";
    echo "<table class='table'>";
      echo "<thread> <tr>";
        echo "<th scope='col'>Id</th>";
        echo "<th scope='col'>Name</th>";
        echo "<th scope='col'>E-mail</th>";
        echo "<th scope='col'>Balance</th>";
      echo "</tr> </thread>";
      while($row = mysqli_fetch_array($result)){
      echo "<tbody><tr>";
            echo "<td scope='row'>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['mail'] . "</td>";
            echo "<td>" . $row['bal'] . "</td>";
        echo "</tr>";
        echo "</tbody></table>";
        echo "<form action='transaction.php' method='post'><button type='submit' class='btn btn-outline-secondary' name='".$row['id']."'>" . $tr. "</button></form></div>";
      }
    ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>