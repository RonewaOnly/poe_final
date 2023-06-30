<?php
        include 'DBconn.php';
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer approved</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap-4.4.1/dist/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap-4.4.1/dist/css/bootstrap.min.css" >
</head>

<body>
    <div class="container backgroun">
        <div class="col-md-12">
            <div class="backhome">
                <a href="homepageAdmin.php">
                    <i class="fa fa-arrow-left">
                        home
                    </i>
                </a>
            </div>

            <div class="tabled">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">customer Firstname</th>
                        <th scope="col">Customer Lastname</th>
                        <th scope="col">Customer username</th>
                        <th scope="col">Customer cell number</th>
                        <th scope="col">Customer Student Number</th>
                        <th scope="col">Customer email</th>
                        <th scope="col">Customer status</th>
                        <th scope="col">Approving</th>
                    </tr>
                </thead>
                <?php
                    $query = mysqli_query($con,"SELECT * FROM tbluser");
                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <form action="" method="post">
                        <tbody>
                                <tr>
                                    <td scope="row"><?=$row['user_id']?></td>
                                    <td><?=$row['firstname']?></td>
                                    <td><?=$row['lastname']?></td>
                                    <td><?=$row['Username']?></td>
                                    <td><?=$row['phoneNum']?></td>
                                    <td><?=$row['studentNums']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['user_status']?></td>
                                    <td>
                                        <input type="hidden" name="values" value="<?=$row['user_id']?>">
                                        <input type="submit" name="approving" value="approved" class="btn btn-danger">
                                        <input type="submit" name="deleteUser" value="remove" class="btn btn-secondary">
                                    </td>



                                </tr>
                            </tbody>
                        </form>
                            
                        <?php
                    }

                
                
                ?>
            </table>
            </div>
            
        </div>
    </div>

    <?php
        if(isset($_POST['approving'])){
                $valueUser = $_POST['values'];
                $query = mysqli_query($con,"UPDATE tbluser SET user_status = 'approved' WHERE userID = '$valueUser'");
                
        }

        if(isset($_POST['deleteUser'])){
            echo 
            "
                <script>
                    alert('are you sure you want to delete the user from the system');
                </script>
            ";
            $valueUser = $_POST['values'];
            $query = mysqli_query($con,"DELETE FROM tbluser WHERE userID = '$valueUser'");
        }
    
    ?>
</body>

</html>