<?php

include 'DBconn.php';

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($con, "UPDATE `tblaorder` SET ordersize = '$update_value' WHERE orderID = '$update_id'");
    if ($update_quantity_query) {
        header('location:shoppingCart.php');
    }
    ;
}
;

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `tblaorder` WHERE orderID = '$remove_id'");
    header('location:shoppingCart.php');
}
;

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM `tblaorder`");
    header('location:shoppingCart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looking at the books in the database</title>
    <link rel="stylesheet" href="adminstyle.css">
    <style>
        a {
            text-decoration: none;
            color: black;

        }

        a.back {
            font-size: 20px;
            text-decoration: none;
            color: black;
            margin-left: 5px;

        }

        a.back:hover {
            font-size: 25px;
            color: red;
        }
    </style>
</head>

<body>

    <h1>Looking at the books in the database</h1>
    <a href="homepageAdmin.php" class="back">&#8592</a>
    <!-- <div class="alb">
                    <img src="books/<?= $row['bookImage'] ?>" alt="" srcset="">
        </div>-->

    <?php
    require_once('DBconn.php');
    $sql = "SELECT * FROM `tblbooks` ORDER BY bookID ASC";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        ?>
        <table class="admin-table" style="border: 2px soild royalblue">
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Book Price</th>
                <th>Book image</th>
                <th>Book Category</th>
                <th>Book Author</th>
                <th>Book description</th>
                <th>Book Publisher</th>
                <th>Book Published Date</th>
                <th>Book Quantity</th>
                <th>Book Status</th>
                <th>Privileges for </th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>
                        <?= $row['bookID'] ?>
                    </td>
                    <td>
                        <?= $row['bookName'] ?>
                    </td>
                    <td>
                        <?= $row['bookPrice'] ?>
                    </td>
                    <td><img class="images" src="<?= $row['bookImage'] ?>" style="wdith: 50px; height: 50px;"></td>
                    <td>
                        <?= $row['bookCategory'] ?>
                    </td>
                    <td>
                        <?= $row['bookAuthor'] ?>
                    </td>
                    <td>
                        <?= $row['bookDetails'] ?>
                    </td>
                    <td>
                        <?= $row['bookPublisher'] ?>
                    </td>
                    <td>
                        <?= $row['bookPublisherDATE'] ?>
                    </td>
                    <td>
                        <?= $row['bookQuautity'] ?>
                    </td>
                    <td>
                        <?= $row['bookstatus'] ?>
                    </td>

                    <td class="privi_btns">
                        <form action="" method="post"></form>
                        <a type="hidden" value="adminUpdate.php?id=<?= $row['bookID'] ?>" name="update" class="update"
                            onClick="onclicks()">Update</a>
                        <a type="submit" value="adminUpdate.php?id=<?= $row['bookID'] ?>" name="remove" class="remove"
                            onClick="onclicks()">remove</a>
                    </td>

                </tr>
                <?php
                echo "<br>";
            }
            ?>
        </table>
        <?php
    }

    ?>
    <script type="text/javascript">

        var updateLInk = document.getElementsByClassName("update");
        var removeLInk = document.getElementsByClassName("remove");
        function onclicks() {
            alert("coming soon");
        }



    </script>



</body>

</html>