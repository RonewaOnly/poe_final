<?php
    include 'DBconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer selling back</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.google.com/">
    <script src="https://kit.fontawesome.com/652647f666.js" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand logos" href="#">
        <img src="books/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="nav-item active">
                <a class="nav-link" href="#" >Sell</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="collectionView.php" >Collection</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="customerHowItWorks.php" >How it works </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="customerBlogs.php" >blogs <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php" id="clickOut">logout</a>
        </li>
        </ul>
    </div>
</nav>

    <div class="container bottom">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title title">Selling the books back</h3>
                    </div>
                    <div class="card-body">
                        <form action="sellingback.php" method="post">
                            <div class="form-group">
                                <label for="bookname">Book Name</label>
                                <input type="text" class="form-control" name="bookname" id="book">
                            </div>
                        
                            <div class="form-group">
                                <label for="bookprice">Book Price</label>
                                <input type="text" class="form-control" name="bookprice" id="book">
                            </div>
                            <div class="form-group">
                                <label for="reason">Why are you selling it? </label>
                                <input type="text" class="form-control" name="reason" id="reason">
                            </div>
                            <div class="form-group">
                                <label for="bookcon">What is the book condition</label>
                                <input type="text" name="bookcon" id="bookcon" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" name="cusID" value="<?session_id()?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Sell" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>