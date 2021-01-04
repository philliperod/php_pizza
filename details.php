<?php

// DELETE A RECORD
// to achieve this, we will need to create a form in html
// with a hidden input that stores the id of the pizza in key attribute 'value' with a delete button
// a submit button will then make a POST request and take that value from the input field into php
// create a conditional statement that will detect if a POST request has been set
// if true, take that id and make a request to the database to say we want to delete the id

    include 'config/db_connect.php';

    // Step 2 - CHECK POST REQUEST DELETE PARAMETER
    // this will look like the GET request if block
    // when the submission runs, it will initialize that value for it $_POST['delete']

    if (isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);
        // this name is obtained from the hidden input in the form
        // which will have the value of id for that record

        // make sql query

        $sql = "DELETE FROM pizzas WHERE id = {$id_to_delete}";

        if (mysqli_query($connect, $sql)) {
            // if successful, change the direction for the user
            header('Location: index.php');
        } else {
            // failure
            echo 'Query error: '.mysqli_error($connect);
        }
    }

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        $sql = "SELECT * FROM pizzas WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($connect);
    }
?>

<?php include 'templates/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<div class="container center">
    <?php if ($pizza) { ?>
    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
    <p>Timestamp: <?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php } else { ?>
    <h4>This pizza does not exists</h4>
    <?php } ?>
</div>

</html>

<?php include 'templates/footer.php'; ?>