<?php

    // SESSIONS
    // consists of a way to preserve certain data across subsequent accesses
    // a user will be assigned a session id
    // either it is stored in the cookie on user side
    // or propagated in the URL
    // allows you to store data between requests in the $_SESSION array

    // simplier way to say it
    // stores data in the server between requests and between loading pages
    // the server is keeping track of info of different things you do on the website
    // session will last until you close the webpage

    // Step 1 - create a form

    // Step 2 - handle the POST requests

    if (isset($_POST['submit'])) {
        session_start();
        // creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

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
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>