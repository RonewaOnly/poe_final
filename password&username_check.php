<?php

 class passwordusername_check{

    public $username;
    public $pass;
    public function username_check($username){
        $error = 0;
        if(strlen($username) < 6){
            echo 
            "
                <srcipt>
                    alert('the user');
                </srcipt>
            
            ";
            ++$error;
            return false;
        }
    }
    public function pass_check($pass){
        $error=0;

        $matching = preg_match("/.(\.[a-zA-z])+(\.[0-9])+(\.!@#$%^&*()_+-=`~<>,.\|{}[])",$pass);

        if($matching < 1){
            echo 
            "
                <script>
                    alert('password is missing some character like Capital letters,special character and etc');
                </script>
            ";
            ++$error;
            return $matching;

        }
    }
}

?>