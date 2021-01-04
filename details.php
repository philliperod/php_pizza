<?php

// DELETE A RECORD
// to achieve this, we will need to create a form in html with a hidden input that stores the id of the pizza in key attribute 'value' with a delete button
// a submit button will then make a POST request and take that value from the input field into php
// create a conditional statement that will detect if a POST request has been set
// if true, take that id and make a request to the database to say we want to delete the id

    include 'config/db_connect.php';

    // Step 2 - CHECK POST REQUEST ID PARAMETER

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

    <!-- Step 1 - DELETE FORM -->

    <form action="details.php" method="POST">
        <!-- 
            // action - is the file we want to run when the submission is made 
            // method - send this data; when submitted then we need to detect that with a conditional statement
        -->
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
        <!-- 
            // type - will be hidden so it will not be seen on the page
            // name - the id created to delete the record from the database
            // value - will equal to the id in the database that was obtained from the GET request to delete
        -->
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php } else { ?>
    <h4>This pizza does not exists</h4>
    <?php } ?>
</div>

</html>

<?php include 'templates/footer.php'; ?>