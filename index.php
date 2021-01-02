<?php 

// Connecting to database
// Options: MySQLi (i = improve) or PDO (PHP Data Objects)

    // Step 1 - connect to database
    $connect = mysqli_connect('localhost', 'phil', 'test1', 'php_pizza');
    // mysqli_connect(host, username, password, database) - function will connect to the whole database
    // this is storing the reference to the database
    
    //Step 2 - check connection to make sure it works (returns an error if not true)
    if(!$connect) {
        echo 'Connection error: ' . mysqli_connect_error();
        // returns the last error message string from the last call to mysqli_connect().
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>


<?php include('templates/footer.php'); ?>


</html>