<<<<<<< HEAD
<?php
if ($user && password_verify($input_password, $user['password'])) {
    // Password is correct
    // Start a session and log the user in
    session_start();
    $_SESSION['id_users'] = $user['id_users'];
    $_SESSION['username'] = $user['username'];
    // Redirect to a protected page
    header("Location: /mon-compte");
    exit();
} else {
    // Password is incorrect, show an error message
    $error = "Invalid username/email or password";
}
=======
<?php
if ($user && password_verify($input_password, $user['password'])) {
    // Password is correct
    // Start a session and log the user in
    session_start();
    $_SESSION['id_users'] = $user['id_users'];
    $_SESSION['username'] = $user['username'];
    // Redirect to a protected page
    header("Location: /mon-compte");
    exit();
} else {
    // Password is incorrect, show an error message
    $error = "Invalid username/email or password";
}
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
?>