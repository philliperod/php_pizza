<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // CLASS AND OBJECTS

    // may contain its own const and variables (properties), and functions (methods)
    // basically a blueprint for an object or data type and create an object based on that

    // Step 1 - create a class
    // class names will start capitalize
    // there are two types of properties: public and private
    // public - you have access to the property outside of the class
    // private - can only be access inside the class
    // typically, you want to set your properties to private for protection
    // this class basically describes a type of object

    class User
    {
        public $email;
        public $name;

        public function login()
        {
            echo 'User is logged in'.'<br\>';
        }
    }

    // Step 2 -
    // creating a new object stored in a variable and which will be based on the class created

    $userOne = new User();
    // this is invoking the class User
    // the variable will have access to the properties and methods in class User

    $userOne->login();
    // to call the property or method, you will use an arrow

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