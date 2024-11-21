<?php
session_start();
if (!isset($_SESSION['data'])) {
    echo "Data not found.";
    exit();
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h2>Registration Result</h2>
            <table>
                <tr>
                    <th>Full Name</th>
                    <td><?= htmlspecialchars($data['name']) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($data['email']) ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?= htmlspecialchars($data['age']) ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= htmlspecialchars($data['gender']) ?></td>
                </tr>
                <tr>
                    <th>Browser/OS</th>
                    <td><?= htmlspecialchars($data['browserInfo']) ?></td>
                </tr>
            </table>

            <h3>Uploaded File Content:</h3>
            <div class="file-content">
                <pre><?= htmlspecialchars($data['fileData']) ?></pre>
            </div>
            <a href="form.php" class="button">Back to Form</a>
        </div>
    </div>
</body>
</html>
