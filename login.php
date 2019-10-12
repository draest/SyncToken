<?php
$username = "admin";
$password = "password";
//q
if ($_POST['username'] == $username && $_POST['pass'] == $password){
    $session_id = uniqid();
    $csrf_token = uniqid() . $session_id;
    $sessions[$username] = $session_id;
    $csrf_tokens[$session_id] = $csrf_token;
    setcookie('session_id', $session_id, time() + (86400 * 30), "/");
    setcookie('username', $username, time() + (86400 * 30), "/");
    file_put_contents('storage/sessions.txt',  '<?php return ' . var_export($sessions, true) . ';');
    file_put_contents('storage/csrf_tokens.txt',  '<?php return ' . var_export($csrf_tokens, true) . ';');
     header("location:welcome.php");
}