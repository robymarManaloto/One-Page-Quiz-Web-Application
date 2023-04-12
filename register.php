<?php

require "vendor/autoload.php";

session_start();
// 2. Why do you think the session variable assignments are wrapped inside an if-else and try-catch statements?
// Wrapping session variable assignments inside if-else and try-catch statements can provide improved error handling, validation, security, conditional assignment, and robustness to web applications that use session variables.

try {
    if (isset($_POST['complete_name'])) {
        $_SESSION['user_complete_name'] = $_POST['complete_name'];
        $_SESSION['user_email'] = $_POST['email'];
		$_SESSION['user_birthdate'] = $_POST['birthdate'];

        header('Location: quiz.php');
        exit;
    } else {
        throw new Exception('Missing the basic information.');
    }
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
}

