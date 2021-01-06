<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // FILE SYSTEM
    // PHP can communicate with files on the user's computer or server

    $quote = readfile('README.txt');
    // reads a file and writes it to the output buffer
    // at the end of the output it will show the number of bytes

    echo $quote;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>