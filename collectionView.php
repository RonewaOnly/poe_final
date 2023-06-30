<?php
include 'DBconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Collections</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNhQJvfEH0kWedQ6G8kt/vO9VwQzMKhmfvQHyHdAu6x"
        crossorigin="anonymous">
    <link rel="stylesheet" href="adminStyle.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1Qkanw" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="studentsStyle.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand logos" href="#">
            <img src="books/logo.jpg" />

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="bookHomepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buyingItems.php" id="clickBuy" onclick="preloader()">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sellingItems.php">Sell</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Collection <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customerHowItWorks.php">How it works </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customerBlogs.php">blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" id="clickOut">logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="title til-h2">Collections page</h2>
        <div id="art_page">
            <h2 style="color: white; font-style:italic;">Art collection</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Arts'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>

        </div>

        <div id="eduction_page">
            <h2 style="color: white;">Education Collection</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Education'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>

        <div id="otherS_page">
            <h2 style="color: white;">Other Sources of Information</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Others'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="Fiction_page">
            <h2 style="color: white;">Fictions Books</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Fiction'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="Non-Fiction_page">
            <h2 style="color: white;">Non Fiction books</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Non-Fiction'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="Science_page">
            <h2 style="color: white;">Science and Technology Book</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Science'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="History_page">
            <h2 style="color: white;">Historical book collection</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='History'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="Politics_page">
            <h2 style="color: white;">Political Science & Current Affairs</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Politics'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>
        <div id="Sports_page">
            <h2 style="color: white;">Sports, Games And Entertainment</h2>
            <div class="content-box">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblbooks WHERE bookCategory='Sports'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<p class='not'>Books not available at the moment...</p>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="<?= $row['bookImage'] ?>" class="card-img-top img-size" alt="<?= $row['bookName'] ?>"
                                    srcset="">
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $row['bookName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>