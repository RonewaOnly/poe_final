<?php
    include 'DBconn.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $postDate = $_POST['datePosted'];
        $postmess = $_POST['message'];

        //create table for posts and insert data into it
        $insert = "INSERT INTO tblblogs(`blogID`,`blogerName`,`blogDate`,`blogMess`) VALUES('','$username','$postDate','$$postmess')";

        $query1 = mysqli_query($con,$insert);
        if($query1){
            $mess = "blog loaded to the public";
            echo "<script>";
            echo" var messbook = document.getElementById('messed');
                messbook.innerHTML = '$mess`;
            
            ";
            echo "</script>";
            header("refresh:2;url=customerBlogs.php");
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="adminStyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li class="nav-item">
                <a class="nav-link" href="sellingItems.php" >Sell</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="collectionView.php" >Collection</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="customerHowItWorks.php" >How it works </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#" >blogs <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="logout.php"" id="clickOut">logout</a>
        </li>
        </ul>
    </div>
</nav>
<br><br><br>
    <p id="messed"></p>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="blogChat">
                    <form action="" method="post" class="formBlock">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id=""
                                placeholder="enter your username" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="datePosted" id="" required>
                        </div>
                        <div class="form-group grouping">
                            <button type="button" class="btn btn-dark" title="one" id="btn1" name="rating1" value="one">
                                <i class="fa fa-star"></i>
                            </button>
                            <button type="button" class="btn btn-dark" id="btn2" name="rating2" value="two">
                                <i class="fa fa-star"></i>
                            </button>
                            <button type="button" class="btn btn-dark" id="btn3" name="rating3">
                                <i class="fa fa-star"></i>
                            </button>
                            <button type="button" class="btn btn-dark" id="btn4" name="rating4">
                                <i class="fa fa-star"></i>
                            </button>
                            <button type="button" class="btn btn-dark" id="btn5" name="rating5">
                                <i class="fa fa-star"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <textarea rows="5" cols="70" class="form-control" name="message" required></textarea>
                        </div>

                        <div class="form-group btnaction">
                            <input type="submit" class="btn btn-secondary" name="submit" value="post">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="leftBlock">
                    <div class="titled">
                        <h3>Blog from other customer...</h3>
                    </div>

                    <div class="card card-blogs">
                    <?php
                        $query = mysqli_query($con,"SELECT * FROM tblblogs");
                        while ($row=mysqli_fetch_array($query)) {
                        ?>
                        <div class="card-header space">
                            <?= $row['blogerName']?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>
                                    <?=$row['blogMess']?>
                                </p>
                                <footer class="blockquote-footer">
                                    <?=$row['blogDate']?>
                                </footer>
                            </blockquote>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var rateBtn = document.getElementById("btn1");
        var rateBtn1 = document.getElementById("btn2");
        var rateBtn2 = document.getElementById("btn3");
        var rateBtn3 = document.getElementById("btn4");
        var rateBtn4 = document.getElementById("btn5");
        var array = [rateBtn, rateBtn1, rateBtn2, rateBtn3, rateBtn4];

        function loogs() {
            //array.forEach(x=> x.style.color="yellow" );
            for (var i = 0; i < array.length; i++) {
                array[i].onclick = function (e) {
                    this.style.color = "yellow";

                    array[i].onclick = function (y) {
                        this.style.color = "white";
                    }
                };
            }
        }
        loogs();
        /* rateBtn.addEventListener("click",()=>{
            rateBtn.style.color ="yellow";
        });*/
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>