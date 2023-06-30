<?php
include 'DBconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card processing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.google.com/">
    <script src="https://kit.fontawesome.com/652647f666.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5 mb-5 ">
        <h1 style="text-align: center;">Payment Processing Page </h1><br />
        <a href="processSale.php" class="backdoor">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <form action="" class="card blocked" method="POST">
            <label for="">Enter card number:</label>
            <input type="text" id="" name="cardnumber" class="inputboxs" maxlength="16"
                placeholder="xxxx xxxx xxxx xxxx" name="cardNumber"><br /><br />
            <label for="">Expiry date (MM / YY):</label>
            <select required name="expiryDateMonth" class="inputboxs ">
                <option value="jan">January</option>
                <option value="feb">February</option>
                <option value="mar">March</option>
                <option value="apr">April</option>
                <option value="may">May</option>
                <option value="jun">June</option>
                <option value="jul">July</option>
                <option value="aug">August</option>
                <option value="sept">September</option>
                <option value="oct">October</option>
                <option value="nov">November</option>
                <option value="dec">December</option>
            </select>
            <span>/</span>
            <select required name="expiryDateYear" class="inputboxs">
                <option value=""></option>
            </select><br /><br />
            <label for="#cvc">CVC code:</label>
            <input type="password" id="cvc" class="inputboxs cvce" placeholder="<CVC>" maxlength="3"
                name="cvcCode"><br /><br />
            <?php
            $select = mysqli_query($con, "SELECT * FROM tblitemprocessed");
            $grand_totals = 0;
            ?>
            <label for="">Amount To Be Paid :</label>

            <?php
            while ($row = mysqli_fetch_array($select)) {
                $grand_totals += $row['itemgrandPrice'];
                ?>
                <p class="inputboxs" name="amountToPay">R
                    <?= $grand_totals ?>
                </p>
                <?php
            }

            ?>
            <input type="submit" name="submit" class="btn btn-primary w-30" value="Submit Payment">
        </form>
    </div>
    <footer class="page-footer font-small blue pt-4">
        <div class="footer-copyright text-center py-3">© Copyright| All rights reserved
            <a href="#">E-store Website by Ronewa & Lesego</a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="<KEY>" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/
                            popper.min.js" integrity="<KEY>" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="<KEY>"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            var currentYear = new Date().getFullYear();
            $('select[name=expiryDateYear]').append('<option selected>' + currentYear + '</option>');
            for (var i = currentYear; i >= 2020; --i) {
                $('select[name=expiryDateYear]').append(`<option>${i}</option>`);
            }
        });
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $cardNums = $_POST['cardnumber'];
        $expireMonth = $_POST['expiryDateMonth'];
        $expireYear = $_POST['expiryDateYear'];
        $cvcNum = $_POST['cvcCode'];
        //$amtPaid = $_POST['amountToPay'];
        $expireDetails = $expireMonth . "/ " . $expireYear;

        $hashcvc = password_hash($cvcNum, PASSWORD_DEFAULT);
        $query = mysqli_query($con, "INSERT INTO tblcard(`cardID`,`cardnumber`,`expirydate`,`cvcnum`) 
        VALUES('','$cardNums','$expireDetails','$hashcvc')
        ");
        if (empty($cardNums) or empty($expireMonth) or empty($expireYear) or empty($cvcNum)) {
            echo
                "
                    <script>
                    alert('fill in the missing');
                </script>;
                ";
        } else {
            if ($query) {
                echo
                    "
                    <script>
                    alert('card saved');
                </script>;
                ";
                header("Location:Thankyou.php");
            }
        }
    }

    ?>



</body>

</html>