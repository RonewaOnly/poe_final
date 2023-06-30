<?php
    include 'DBconn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you...</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .block{
            display: block!important;
            text-align: center;
            width: 97.5vw;
            height: 80vh;
            border : solid black 4px;
            background:#f7d69c;
            color:black;
            font-size: large;

        }
        .block p{
            margin-top: 450px;
            font-size: x-large;
        }
        .block a{
            text-decoration: none;
            font-style: italic;
            color: black;
        }
        .block a:hover{
            width: fit-content;
            padding:12px ;
            border: 2px solid white;
            border-radius: 25px;

        }


    </style>
</head>
<body>
<div class="topNav">
        <div class="imglogo">
            <img src="backimages/logo.jpg" id="bus-logo" alt="logo">
        </div>

        <div class="cartBox">
            <a href="processSale.php">
                <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="block">
        <p>Thank you for buying...</p>
        <?php
            $query =mysqli_query($con,"SELECT * FROM tbluser WHERE visited='1'");
            $row = mysqli_fetch_assoc($query);
            $names = $row['firstname']." ".$row['lastname'];
            ?>
                <h5>
                    <?=$names?>
                </h5>
            <?php
        ?>
        <a href="bookHomepage.php">back home </a>

    </div>
</body>
</html>