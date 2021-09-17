<!doctype html>
<html lang="en">
  <head>
    <title>SK Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        <?php include"style.php"?>
        @media (max-width: 576px){
            .jumbotron{
                background: url("banksm.jpg") no-repeat;
                height: 100vh;
                width:  100vw;
                margin-bottom: 0%;
                padding: 0;
                margin: 0;
                overflow-x:auto;
            }
            #main-content #btn1{
            margin: 30% auto auto 20%;
            }
            #main-content #btn2{
            margin: 50% auto auto 20%;
            }
        }
        @media (min-width: 1200px){
            .jumbotron{
            background: url("bank.jpg") no-repeat;
            height: 100vh;
            margin-bottom: 0%;
            }
            #main-content #btn1{
            margin: 10% auto auto 55%;
            }
            #main-content #btn2{
            margin: 17% auto auto 55%;
            }
        }
        @media (min-width: 992px) and (max-width: 1200px){
            .jumbotron{
            background: url("banklg.jpg") no-repeat;
            height: 100vh;
            margin-bottom: 0%;
            }
            #main-content #btn1{
            margin: 20% auto auto 50%;
            }
            #main-content #btn2{
            margin: 30% auto auto 50%;
            }
        }
        @media (min-width: 768px) and (max-width: 992px){
            .jumbotron{
            background: url("bankmd.jpg") no-repeat;
            height: 100vh;
            margin-bottom: 0%;
            }
            #main-content #btn1{
            margin: 20% auto auto 45%;
            }
            #main-content #btn2{
            margin: 33% auto auto 45%;
            }
        }
        @media (min-width: 576px) and (max-width: 768px){
            .jumbotron{
                background: url("banksm.jpg") no-repeat;
                height: 100vh;
                width:  100vw;
                margin-bottom: 0%;
                padding: 0%;
            }
            #main-content #btn1{
            margin: 25% auto auto 35%;
            }
            #main-content #btn2{
            margin: 40% auto auto 35%;
            }
        }
        #main-content .btn{
        position: absolute;
    }
    .jumbotron button{
        width: 250px;
    }
    .jumbotron{
        border-radius: 0;
    }
    .jumbotron a{
        color: white;
        text-decoration: none;
    }
    </style>
  </head>
  <body>
      <?php include"header.php"; ?>
    
      <div id="main-content" class="container-fluid">
          <div class="jumbotron">
              <a href="2display.php"><button type="button" class="btn btn-primary" id="btn1">View All Accounts</button></a>
              <a href="history.php"><button type="button" class="btn btn-primary" id="btn2">Transaction History</button></a>
          </div>
      </div>
    <?php include "footer.php"; ?>