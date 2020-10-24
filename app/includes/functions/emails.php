<?php
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers .= "From: Boobyrae Games - Noreply <noreply@boobyrae.games>" . "\r\n";
$headers .= "Reply-To: noreply@boobyrae.games" . "\r\n";

function sendRegistrationEmail($username, $email, $activationKey) {
    $to_email = $email;
    $subject = "Please Confirm Your Account";
    $body = "Dear $username,<br><br>You need to activate your account before logging in. Please click the below.<br><br><a href='https://app.boobyrae.games/activate.php?akey=$activationKey'>Click here to activate your account</a>";
    global $headers;
    
    mail($to_email, $subject, $body, $headers);
}


function sendRecoveryEmail($email, $recoveryKey) {
    $username = getUsernameFromEmailDetail($email);
 
    $to_email = $email;
    $subject = "Account Recovery";
    $body = "Dear $username,<br><br>Someone has tried to recover your account, if this was you, please use the below link.<br><br><a href='https://app.boobyrae.games/recover-password.php?akey=$recoveryKey'>Click here to recover your account</a>";
    global $headers;
    
    mail($to_email, $subject, $body, $headers);
}

?>