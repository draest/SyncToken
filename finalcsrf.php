<?php
$csrf_tokens = include 'storage/csrf_tokens.txt';

if(!isset($_COOKIE['session_id']) or !isset($_COOKIE['username'])) {
        echo "Cookie is not set. Please login again.";
    } else {
        if(!isset($_POST["csrf_token"])){
            header("location: ../home.php?error=Failed! Please login and try again!");
        }else{
            // Validate the stored csrf token and the token sent by the client
            if($csrf_tokens[$_COOKIE['session_id']] == $_POST["csrf_token"]){
                echo "CSRF Successfully validated";
            }else{
                echo "CSRF Not valid. Please login again.";
            }
        }
    }

?>
