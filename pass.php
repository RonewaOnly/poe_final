<?php
    $hased = '$2y$10$EAuUKZl.wZ0Fc9XKKY3/3OUf56hdfdDpeWgoDAz01XlaekswZseO.';
  //  $hasing = password_hash('readbook',PASSWORD_DEFAULT);
   // echo $hasing;
    if(password_verify('readbook', $hased)){
        print("true");
        return true;
    }else{
        print("false");
        return false;
    }
?>