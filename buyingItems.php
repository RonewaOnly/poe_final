<?php
include 'DBconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buying items</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .homebtn {
            background: transparent;
            color: white;
            border: none;
            padding: 5px 20px;
            height: fit-content;

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
    <p class="homebtn"><a href="bookHomepage.php"
            style="text-decoration: none; font-style:italic; color: black;">Home</a></p>
    <div class="bottompiece">
        <?php
        $query = mysqli_query($con, "SELECT * FROM tblbooks");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="card card-con">
                    <form action="" method="get">
                        <div class="card-header">
                            <img src="<?= $row['bookImage'] ?>" alt="book image"><!--this is the link for the book pics-->
                        </div>
                        <div class="card-content">
                            <h2>
                                <?= $row['bookName']; ?><!--Name of the book-->
                            </h2>
                            <p>
                                R
                                <?= $row['bookPrice']; ?> <!--Price of each item in the cart -->
                            </p>
                            <input type="hidden" name="productID" value="<?= $row['bookID'] ?>">
                            <input type="hidden" name="productName" value="<?= $row['bookName'] ?>">
                            <input type="hidden" name="productQuantity" value="<?= $row['bookQuautity'] ?>">
                            <input type="hidden" name="productPrice" value="<?= $row['bookPrice'] ?>">
                            <input type="hidden" name="productImage" value="<?= $row['bookImage'] ?>">
                            <input type="submit" id="addCart" name="addCart" value="submit">

                        </div>

                    </form>
                </div>

                <?php
            }
        }
        ?>
    </div>

    <?php
if (isset($_GET['addCart'])) {
    $proId = $_GET['productID'];
    $productNames = $_GET['productName'];
    $productQuan = $_GET['productQuantity'];
    $productPrices = $_GET['productPrice'];
    $productImages = $_GET['productImage'];
    $coun = 1;
    $cusLoged = mysqli_query($con, "SELECT user_id FROM tbluser WHERE visited='1'"); //this will be linking the user table to the order table
    $row = mysqli_fetch_assoc($cusLoged);
    $getID = $row['user_id'];

    /****taking in the selected items**** */
    $selecting = mysqli_query($con, "SELECT * FROM tblorder WHERE itemName='$productNames'");
    $rowSele = mysqli_fetch_assoc($selecting);
    if (mysqli_num_rows($selecting) > 0) {
        echo "<script>
            alert('item is already selected');
        </script>";
       // header("location:buyingItems.php?userID=$getID&count=$coun");
    } else {
        $query = mysqli_query($con, "INSERT INTO tblorder (`orderID`,`itemName`,`itemQuantity`,`itemImage`,`itemPrice`,`cusid`)
        VALUES('','$productNames','$productQuan','$productImages','$productPrices','$getID')");
        echo "
            <script>
                alert('item added into cart');
            </script>";
       /// header("location:buyingItems.php?userID=$getID&count=$coun");

    }
}
?>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>