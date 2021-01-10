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

        public function __construct($name, $email)
        {
            $this->email = $email.'<br/>';
            $this->name = $name;
        }

        public function login()
        {
            echo $this->name.' is logged in';
        }
    }

    // $userOne = new User();
    // $userOne->login();
    // echo $userOne->name;

    $userTwo = new User('Rod', 'roddy@rod.com');
    echo $userTwo->name;
    echo $userTwo->email;
    echo $userTwo->login();

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