<?php

    //SAVING DATA TO THE DATABASE

    include 'config/db_connect.php';

    $email = $title = $ingredients = '';
    $error = [
        'email' => '',
        'title' => '',
        'ingredients' => '',
    ];

    if (isset($_POST['submit'])) {
        if (empty($_POST['email'])) {
            $error['email'] = 'An email is required <br/>';
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email must be a valid email address <br \>';
            }
        }

        if (empty($_POST['title'])) {
            $error['title'] = 'A title is required <br/>';
        } else {
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $error['title'] = 'Title must be letters and spaces only <br \>';
            }
        }

        if (empty($_POST['ingredients'])) {
            $error['ingredients'] = 'Ingredients are required <br/>';
        } else {
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $error['ingredients'] = 'Ingredients must be comma separated list only <br \>';
            }
        }

        if (array_filter($error)) {
            echo 'Errors in the form';
        } else {
            // this is where you will save the data to the database if no Errors
            // Step 1 - getting the data ready

            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $ingredients = mysqli_real_escape_string($connect, $_POST['ingredients']);
            // mysqli_real_escape_string(connection, value_to_store_in_database)
            // this escapes any malicious SQL characters from SQL injections

            // Step 2 - setup a SQL string to import the data into the database

            $sql = "INSERT INTO pizzas(email, title, ingredients) VALUES('{$email}', '{$title}', '{$ingredients}')";
            // insert the data into the table $pizzas
            // which will update the columns(email, title, ingredients)
            // with these values($email, $title, $ingredients) for the columns

            // Step 3 - save to database and check if it works

            if (mysqli_query($connect, $sql)) {
                // if successful (saved to the database), run code
                header('Location: index.php');
            // redirect to index.php
            } else {
                // if error, run error function
                echo 'Query error: '.mysqli_error($connect);
            }
        }
        // redirect command fires only if a post has been submitte
        // which means it needs to be inside the main if blocks
        // if written outside the if blocks then it will automatically complete without any input
        // and since the $errors array will always be empty when you enter the page
        // the redirect will fire immediately
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <input type="email" name="email" class="validate" value="<?php echo htmlspecialchars($email); ?>">
        <label for="email">Your Email: </label>
        <div class="red-text"><?php echo $error['email']; ?></div>
        <input type="text" name="title" class="validate" value="<?php echo htmlspecialchars($title); ?>">
        <label for="title">Pizza Title: </label>
        <div class="red-text"><?php echo $error['title']; ?></div>
        <input type="text" name="ingredients" class="validate" value="<?php echo htmlspecialchars($ingredients); ?>">
        <label for="ingredients">Ingredients (comma separated): </label>
        <div class="red-text"><?php echo $error['ingredients']; ?></div>
        <br>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php'; ?>


</html>