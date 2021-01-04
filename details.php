<?php

    // OBTAINING A SINGLE RECORD

    // Step 1 - in index.php, use the <a> tag to reference this page
    // <a href="details.php?id=<?php echo $pizza['id']; >
    // created a query string
    // this will be a GET request that looks for a specific id
    // basically want to access the individual data and link it to the url
    //

    // Step 2 - check GET request id parameter
    // localhost:8888/details.php?id={id_number}
    // id={id_number} looks exactly like the GET request

    include 'config/db_connect.php';

    if (isset($_GET['id'])) {
        // isset() - checking if the id has been set
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        //mysqli_real_escape_string() - escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection

        // Step 3 - make SQL query

        $sql = "SELECT * FROM pizzas WHERE id = {$id}";
        // must be in double quotes

        // Step 4 - get query result

        $result = mysqli_query($connect, $sql);

        // Step 5 - fetch result in array format

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($connect);

        print_r($pizza);
    }

?>

<?php include 'templates/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<h2>Details</h2>

</html>

<?php include 'templates/footer.php'; ?>