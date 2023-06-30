<?php
require_once('DBconn.php');

if (isset($_POST['add_books']) && isset($_POST['BookName']) && isset($_POST['price']) && isset($_FILES['image'])) {
    echo "<pre>";
    print_r($_FILES['image']);
    echo "</pre>";
    $BookName = $_POST['BookName'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $bookauthors = $_POST['author'];
    $bookcategory = $_POST['category'];
    $bookdescription = $_POST['details'];
    $bookstatus = $_POST['Condition'];
    $bookquantity = $_POST['quantity'];
    $bookpublisher = $_POST['publisher'];
    $bookpublicationDate = $_POST['publish_date'];


    $bookimg_name = $_FILES['image']['name']; //this gets the name of image/file
    $bookimg_size = $_FILES['image']['size'];
    $bookimg_tmp_name = $_FILES['image']['tmp_name']; //where it was taken from
    $bookimg_error = $_FILES['image']['error'];

    if ($bookimg_error === 0) {
        if ($bookimg_size > 200000) {
            echo "File size is too large.";

        } else {
            $bookimg_ext = pathinfo($bookimg_name, PATHINFO_EXTENSION); //This displays the type of the file uploaded
            $bookimg_ext_lowercase = strtolower($bookimg_ext);
            $bookimg_ex_lc = trim($bookimg_ext_lowercase);
            $allowed_exs = array('jpg', 'jpeg', 'png');


            if (in_array($bookimg_ex_lc, $allowed_exs)) { //this check if the image is one of the set type of format for the image
                $bookimg_name_new = uniqid('IMG-', true) . "." . $bookimg_ex_lc; //this IMG is setting to be place with image name
                $bookimg_path = "uploadedPic/$bookimg_name_new";
                move_uploaded_file($bookimg_tmp_name, $bookimg_path); //this moving the image from where it was taken from to a other folder

                //Inserting a database
                $query = "INSERT INTO `tblbooks`(`bookID`, `bookName`, `bookAuthor`, `bookPrice`, `bookImage`, `bookCategory`, `bookstatus`, `bookQuautity`, `bookDetails`, `bookPublisher`, `bookPublisherDATE`) 
                    VALUES ('','$BookName','$bookauthors','$price','$bookimg_path','$bookcategory','$bookstatus','$bookquantity','$bookdescription','$bookpublisher','$bookpublicationDate')";
                $result = mysqli_query($con, $query);
                header("Location: adminView.php");
            } else {
                $errors = "sorry, only jpg, jpeg, png images are allowed";
                header('Location: homepageAdmin.php?error="$errors"');
            }
            // header('Location: books.php');

        }

    } else {
        $errors = "unknown error";
        header('Location: homepageAdmin.php?error="$errors"');
    }

} else {
    echo "Error" . mysqli_error($con);
    $errors = "unknown error";
    header('Location: homepageAdmin.php?error="$errors"');
}

?>