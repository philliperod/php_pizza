<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // FILE SYSTEM

    $file = 'TEST.txt';

    // Step 1 - open file for reading

    $handle = fopen($file, 'r+');
    // fopen(file_name, mode) - opens file or URL
    // 'r' - means read-only

    // Step 2 - read the file

    // echo fread($handle, filesize($file));
    // fread(handle_name, up_to_length_bytes_read)
    // reads up to length bytes from the file pointer referenced by stream

    // Step 3 - read a single line

    // echo fgets($handle);
    // echo fgets($handle);
    // fgets($handle) - gets line from file pointer
    // the point/cursor will start at the beginning of the line
    // when you have multiple functions, it will continue to start at the next line

    // Step 4 - read a single character

    // echo fgetc($handle);
    // fgetc($handle) - gets a single character from file pointer

    // Step 5 - writing to a file

    fwrite($handle, "Don't argue with idiots.");
    // fwrite($handle, 'new_string_to_use')
    // writes the contents of string to the file stream pointed to by handle

    // Step 6 - closing the file

    fclose($handle);
    // fclose($handle) - closes an open file pointer
    // always close the file when done

    // Side note
    // unlink(file_name) - deletes a file

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