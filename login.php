<?php
//hardcoded username and password
$username = "admin";
$password = "password";
//if the details match, this section should execute
//a unique id is generated and set for the session
//a unique csrf token is generated based on the session id that was generated
//the session and username value are linked and set to the session id
//the csrf token is mapped to the session identifier
//2 cookies are made
//2 files are made to store the csrf tokens and session
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