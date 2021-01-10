<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // CLASS AND OBJECTS

    // Step 3 - how to set properties that have empty values
    // use a constructor function
    // special functions inside classes that runs whenever a class is set with 'new Class()'
    // so when it runs it will run the constructor and set some initial values

    class User
    {
        public $email;
        public $name;

        public function __construct()
        {
            $this->email = 'phil@phil.com';
            $this->name = 'Philly';
        }

        public function login()
        {
            echo 'User is logged in'.'<br/>';
        }
    }

    $userOne = new User();
    $userOne->login();
    echo $userOne->name;
    // when calling a property, you do not need $ before it
    // current example has an empty value for the property

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