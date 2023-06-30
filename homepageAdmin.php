<?php
include 'DBconn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <!--Admin nav --->
    <nav class="admin-navbar">
        <ul class="navgate">
            <li>
                <img class="logo_frame" src="books/logo.jpg" alt="logo" srcset="">
            </li>
            <li class="hoverings">
                <img class="admin_face" src="books/face=default.jpeg" alt="admin-photo" onclick="hovered()" name=""
                    srcset="">
                <ul class="admin-details" id="ad-dd">
                    <li><a href="">Account settings</a></li>
                    <li><a href="">Customers blogs</a></li>
                    <li class="msg_bot"><a href=""><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <p class="message">0</p>
                    </li>
                </ul>
            </li>
            <li class="btn-exit">
                <a href="loginAdmin.php" target="_blank" rel="noopener noreferrer">Logout</a>
            </li>
        </ul>
    </nav>

    <!---main section--->
    <div class="main-section">
        <div class="row left-section">
            <div class="col-md-3 admin-side">
                <div class="admin-side-bar">
                    <ul class="admin-side-ul">
                        <li class="admin-side-li">
                            <a href="#homeadmin" class="admin-side-a active" id="clickHome">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="admin-side-li">
                            <a href="#customerViewing" class="admin-side-a" id="clickCustomers">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                        <li class="admin-side-li">
                            <a href="adminView.php" class="admin-side-a">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                <p>view-books</p>
                            </a>
                        </li>
                        <li class="admin-side-li">
                            <a href="adminChangeCustomers.php" class="admin-side-a">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        <li class="admin-side-li">
                            <a href="#addBookFunction" class="admin-side-a" id="clickBooks">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                <p>Add Book</p>

                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!---Add book--->
        <section class="col-md-9" id="addBookFunction">
            <div class="row right-side">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Book</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="uploadBooks.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" class="form-control" name="BookName"
                                        placeholder="Enter Book Name">
                                </div>
                                <div class="form-group">
                                    <label>Book Author</label>
                                    <input type="text" class="form-control" name="author"
                                        placeholder="Enter Book Author">
                                </div>
                                <div class="form-group">
                                    <label>Book Price</label>
                                    <input type="number" class="form-control" name="price"
                                        placeholder="Enter Book Price">
                                </div>
                                <div class="form-group">
                                    <label>Book Image</label>
                                    <input type="file" class="form-control" name="image" placeholder="Enter Book Image">
                                </div>
                                <div class="form-group">
                                    <label>Book Category</label>
                                    <select class="form-control" name="category">
                                        <option value="none">Select Category</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Non-Fiction">Non Fiction</option>
                                        <option value="Science">Science</option>
                                        <option value="History">History</option>
                                        <option value="Politics">Politics</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Arts">Arts</option>
                                        <option value="Education">Education</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book Condition</label>
                                    <select class="form-control" name="Condition">
                                        <option value="NONE">Select Status</option>
                                        <option value="GOOD">Good</option>
                                        <option value="bad">bad</option>
                                        <option value="Excellent">Excellent</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book Quantity</label>
                                    <input type="text" class="form-control" name="quantity"
                                        placeholder="Enter Book Quantity">
                                </div>
                                <div class="form-group">
                                    <label>Book Details</label>
                                    <textarea class="form-control" name="details" placeholder="Enter Book Details"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Book Publisher</label>
                                    <input type="text" class="form-control" name="publisher"
                                        placeholder="Enter Book Publisher">
                                </div>
                                <div class="form-group">
                                    <label>Book Publish Date</label>
                                    <input type="date" class="form-control" name="publish_date"
                                        placeholder="Enter Book Publish Date">

                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-default" name="close-btn"
                                            data-dismiss="modal" value="Close">
                                        <input type="submit" class="btn btn-primary" name="add_books"
                                            value="Save changes">
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!---Home--->

        <section class="col-md-9 " id="homeadmin">
            <div class="row right-side ">
                <div class="col-md-12 ">
                    <h3 class="card-title welcomed">Welcome to other day</h3>

                    <div class="time_moving">
                        <p id="todayDate"></p>
                        <p id="time"></p>
                    </div>

                </div>
            </div>
        </section>

        <section class="col-md-9 " id="customerViewing">
            <div class="row right-side ">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer Viewing</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Lastname</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th>Customer Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM tbluser");
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $row['user_id']; ?>
                                        </td>
                                        <td>
                                            <?= $row['firstname'] ?>
                                        </td>
                                        <td>
                                            <?= $row['lastname'] ?>
                                        </td>
                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        <td>
                                            <?= $row['phoneNum'] ?>
                                        </td>
                                        <td>
                                            <?= $row['user_status'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        var x = document.getElementsByClassName("admin_face");

        function hovered() {
            var hovering = document.getElementById("ad-dd");
            if (hovering.style.display == "flex") {
                hovering.style.display = "none";
            }
            else {
                hovering.style.display = "flex";
            }
        }
    </script>
        <script src="adminApp.js"></script>

</body>

</html>