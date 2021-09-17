<!DOCTYPE html>
<html>
<head>
    <title>All Accounts</title>
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
    <h1 class="head"> Accounts </h1><br><br>

<?php

include "connect.php";

$sql = "SELECT * FROM account";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{   
    $t="SELECT";
    echo "<div class='respone'>";
    echo "<table class='table'>";
    echo "<thread> <tr>";
        echo "<th scope='col'>Id</th>";
        echo "<th scope='col'>Name</th>";
        echo "<th scope='col'>E-mail</th>";
        echo "<th scope='col'>Balance</th>";
        echo "<th scope='col'>Transact</th>";
    echo "</tr> </thread>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tbody><tr>";
            echo "<td scope='row'>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['mail'] . "</td>";
            echo "<td>" . $row['bal'] . "</td>";
            echo "<td><form action='oneAccount.php' method='post'><button type='submit' class='btn btn-outline-success' name='".$row['id']."'>" . $t . "</button></form></td>";
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