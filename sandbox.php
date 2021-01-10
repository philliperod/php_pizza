<?php

    if (isset($_POST['submit'])) {
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        header('Location: index.php');
    }

    // CLASS AND OBJECTS - GETTERS AND SETTERS

    // special class functions that allows you to get a property and set a value

    class User
    {
        private $email;
        private $name;
        // this will prevent the user to access the property

        public function __construct($name, $email)
        {
            $this->email = $email.'<br/>';
            $this->name = $name;
        }

        public function login()
        {
            echo $this->name.' is logged in';
        }

        public function getName()
        {
            return $this->name.'<br/>';
        }

        // this will access the property when it is private inside the class

        public function setName($name)
        {
            if (is_string($name) && strlen($name) > 1) {
                // check if input is a string and more than two characters
                $this->name = $name;

                return "Name has been updated to {$name}";
                // double quote is needed for object literal
            }

            return 'Not a valid name';
        }

        // this will add value to the property
        // will take in a parameter
    }

    $userTwo = new User('Rod', 'roddy@rod.com');
    echo $userTwo->getName();
    echo $userTwo->setName('Phil');

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