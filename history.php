<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <!--Bootsrap part-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--End part-->
    <style>
            <?php include"style.php"; ?>
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
        </style>
</head>
<body> 
<?php include"header.php"; ?>   
<h1 class="head">Transaction history</h1><br><br>
<?php

include "connect.php";

$sql = "SELECT * FROM transaction";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    echo "<div class='respone'>";
    echo "<table class='table'>";
    echo "<thread> <tr>";
        echo "<th scope='col'>Date</th>";
        echo "<th scope='col'>From</th>";
        echo "<th scope='col'>To</th>";
        echo "<th scope='col'>Amount</th>";
        echo "<th scope='col'>Status</th>";
    echo "</tr> </thread>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tbody><tr>";
            echo "<td scope='row'>" . $row['date'] . "</td>";
            echo "<td>" . $row['fromId'] . "</td>";
            echo "<td>" . $row['toId'] . "</td>";
            echo "<td>₹" . $row['amount'] . "/-</td>";
            echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table></div>";
}
else 
{
    echo "0 results";
}
$conn->close();
?>
<?php include"footer.php"; ?>