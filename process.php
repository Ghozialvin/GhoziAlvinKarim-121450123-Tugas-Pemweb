<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);

    $fileData = '';
    $fileError = '';

    if (isset($_FILES['textfile']) && $_FILES['textfile']['error'] == 0) {
        $file = $_FILES['textfile'];
        $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($fileType !== 'txt') {
            $fileError = "Only text files (.txt) are allowed.";
        } elseif ($file['size'] > 1048576) {
            $fileError = "File size is too large.";
        } else {
            $fileData = file_get_contents($file['tmp_name']);
        }
    }

    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    // Redirect to result page with data
    session_start();
    $_SESSION['data'] = compact('name', 'email', 'age', 'gender', 'fileData', 'browserInfo');
    header('Location: result.php');
    exit();
} else {
    echo "Invalid request method.";
}
?>
