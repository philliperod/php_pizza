<?php 

// Connecting to database
// Options: MySQLi (i = improve) or PDO (PHP Data Objects)


    // Step 1 - connect to database

    $connect = mysqli_connect('localhost', 'phil', 'test1', 'php_pizza');
    // mysqli_connect(host, username, password, database) - function will connect to the whole database
    // this is storing the reference to the database
    

    // Step 2 - check connection to make sure it works (returns an error if not true)

    if(!$connect) {
        echo 'Connection error: ' . mysqli_connect_error();
        // returns the last error message string from the last call to mysqli_connect().
    }

    
    // Step 3.a - write queries for all pizzas
    // 3 steps to this - construct a query, make the query, then fetch the query

    $sql = 'SELECT title, ingredients, id FROM pizzas';
    // SELECT - to query data from a table
    // * - selects all (in the previous iteration before changing to above)
    // FROM - specify the source table and its schema name
    // pizzas - table that was created


    // Step 3.b - make query and get results

    $result = mysqli_query($connect, $sql);
    // mysqli_query(database, command_to_use)
    // first parameter is the reference to the database
    // second parameter is the query used to get specificity from the database


    // Step 3.c - fetch the resulting row(s) as an array
    
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // mysqli_fetch_all(result, return_as)
    // first parameter is the result of the query made
    // second parameter is returning it into an associative array
    // this basically formats your results

    print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>


<?php include('templates/footer.php'); ?>


</html>