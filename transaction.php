<?php
include "connect.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Transfer Gateway</title>
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
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
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
      overflow-x:hidden;
    }
    #fromusr option, #tousr option{
      text-align: center;
    }
    #from,#to{
      margin-left: 5%;
    }
    .sec{
      overflow-x: auto;
      overflow-y: auto;
    }
    </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include"header.php"; ?>
    <h1 class="head">Funds Transfer</h1><br>
    <div id="from">From:</div><br>
    <div class="container">
    <?php
        for($i=111001;$i<=111010;$i++){
            if (isset($_POST[$i]))
            {
                $sql = "Select * from account where id=".$i;
                $result = mysqli_query($conn, $sql);
                $sid = $i;
                goto here;
            }
        }
        here:
        echo "<div class='respone'>";
        echo "<table class='table'>";
          echo "<thread> <tr>";
            echo "<th scope='col'>Id</th>";
            echo "<th scope='col'>Name</th>";
            echo "<th scope='col'>Balance</th>";
          echo "</tr> </thread>";
          while($row = mysqli_fetch_array($result)){
          echo "<tbody><tr>";
                echo "<td scope='row'>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['bal'] . "</td>";
            echo "</tr>";
            echo "</tbody></table></div>";
        }
    ?>
    </div><br><br>
    <div class="sec">
    <form method="post" action="transfer2.php">
    <input type="hidden" name="sid" id="sid" value="<?php echo $sid; ?>">
    <label for="to" id="to">To: </label>
      <select required name="tousr" id="tousr">
      <option disabled selected hidden value="">select account</option>
        <?php
        $result=mysqli_query($conn,"Select id from account where id!=".$sid);
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <option><?php echo $row['id']; ?></option>
        <?php
        }
        ?>
      </select> &emsp;&emsp;&emsp;<br class="d-block d-sm-none"><br class="d-block d-sm-none">&emsp;
      <label for="amount">Amount: </label>
      <input required type="number" name="amount" min="1" max="200000" id="amount"><br class="d-block d-sm-none">&emsp;
      <button type="submit" name="transfer" class="btn btn-outline-dark"><b>Transfer</b></button>
    </form> <br></div>
  </body>
</html>  