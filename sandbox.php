<?php

    // COOKIES
    // rather than keeping a session variable in the server
    // you can set a cookie for the user that will store data in their computer
    // this will be used to identify if you went to a particular page before
    // added an item to your cart, past behavior to enchance experience
    // side note - sessions is much safer than cookies
    // because you're keeping the data hidden on the server than on the computer
    // for sensitive data, it's best to keep it in sessions


    // Step 1 - checking cookie for gender

    if (isset($_POST['submit'])) {
        // first need to check if the form has been submitted
        
        setcookie('gender', $_POST['gender'], time() + 86400)
        // set name of cookie, apply value to it from <select 'gender'>, expire in 24 hr
        
        // setcookie(name_of_cookie, value_applied_to_cookie, cookie_expiration)
        // defines a cookie to be sent along with the rest of the HTTP headers
        // must be sent BEFORE any output from your script
        // requires that you place calls to this function prior to any output



        session_start();
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
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>