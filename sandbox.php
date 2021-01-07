<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // FILE SYSTEM

    $file = 'QUOTES.txt';

    if (file_exists($file)) {
        echo readfile($file).'<br/>';
        // reads the content of the file
        copy($file, 'QUOTES.txt');
        // copies file and creates a new file
        echo realpath($file).'<br/>';
        // outputs the file pathname
        echo filesize($file).'<br/>';
        // outputs the file size
        rename($file, 'TEST.TXT');
    // renames the old file to a new file name
    } else {
        echo 'File does not exist';
    }

    mkdir('quotes');
    // attempts to create the directory specified by pathname

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