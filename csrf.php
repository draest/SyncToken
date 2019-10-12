<?php
$ctokens = include 'storage/csrf_tokens.txt';

if(!isset($_COOKIE['session_id'])) {
    echo "Error! Please Login!";
} else {
    echo $ctokens[$_COOKIE['session_id']];
}

?>
