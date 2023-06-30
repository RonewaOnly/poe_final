<?php
include 'DBconn.php';
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $idfoind = $_SESSION['studID'];
    $update_quantity_query = mysqli_query($con, "UPDATE `tblorder` SET itemQuantity = '$update_value' WHERE orderID = '$update_id'");
    if ($update_quantity_query) {
        header('location:processSale.php');
    }
    ;
}
;

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `tblorder` WHERE orderID = '$remove_id'");
    header('location:processSale.php');
}
;

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM `tblorder`");
    header('location:processSale.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNhQJvfEH0kWedQ6G8kt/vO9VwQzMKhmfvQHyHdAu6x"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1Qkanw" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <section class="shopping-cart">

            <h3 class="heading">shopping cart</h3>
            <form action="payingProcess.php" method="post">
                <table>
                    <thead>
                        <th>image</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total price</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
                        $select_cart = mysqli_query($con, "SELECT * FROM `tblorder`");
                        $grand_total = 0;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                ?>
                                <tr>
                                    <td><img src="<?= $fetch_cart['itemImage'] ?>" height="100" alt=""></td>
                                    <td>
                                        <?= $fetch_cart['itemName']; ?>
                                    </td>
                                    <td>R
                                        <?= ($fetch_cart['itemPrice']) ?>/-
                                    </td>
                                    <td class="flexed">
                                        <form action="" method="post">
                                            <input type="hidden" name="update_quantity_id"
                                                value="<?= $fetch_cart['orderID'] ?>">
                                            <input type="number" name="update_quantity" min="1"
                                                value="<?= $fetch_cart['itemQuantity'] ?>" id="updateBox">
                                            <input type="submit" value="update" name="update_update_btn">
                                        </form>
                                    </td>
                                    <td>R
                                        <?= $sub_total = ($fetch_cart['itemPrice'] * $fetch_cart['itemQuantity']) ?>/-
                                    </td>
                                    <td class="removeBtn"><a href="processSale.php?remove=<?= $fetch_cart['orderID'] ?>"
                                            onclick="return confirm('remove item from cart?')" class="delete-btn"> <i
                                                class="fas fa-trash"></i> remove</a></td>
                                </tr>
                                <input type="hidden" name="productName" value="<?=$fetch_cart['itemName']?>">
                                <input type="hidden" name="productQuan" value="<?=$fetch_cart['itemQuantity']?>">
                                <input type="hidden" name="productPrice" value="<?=$fetch_cart['itemPrice']?>">

                                <?php
                                $grand_total += $sub_total;
                                ?>
                                    <input type="hidden" name="productTotal" value="<?=$fetch_cart['itemName']?>">
                                <?php
                            }
                            ;
                        };
                        ?>
                        <tr class="table-bottom">
                            <td><a href="buyingItems.php" class="option-btn" style="margin-top: 0;">continue shopping</a>
                            </td>
                            <td colspan="3">grand total</td>
                            <td>R
                                <?= $grand_total ?>/-
                            </td>
                            <td><a href="processSale.php?delete_all"
                                    onclick="return confirm('are you sure you want to delete all?');"
                                    class="delete-btn">
                                    <i class="fas fa-trash"></i> delete all
                                </a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout-btn">
                <input type="submit" name="submit" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" value="procced to checkout">
            </div>
            </form>
        </section>

    </div>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>