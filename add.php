<?php 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    

    // SERVER SIDE VALIDATION

    if(isset($_POST['submit'])){
        
        if(empty($_POST['email'])){
            echo 'An email is required <br/>';
        } else {
            $email = $_POST['email']; // store that data in a variable
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                // filter_var - filters a variable with a specified filter
                // has 2 parameters - (value, FILTER_TO_APPLY)
                // FILTER_VALIDATE_EMAIL - validates whether the value is a valid e-mail address
                // if statement checks if it is NOT TRUE
                echo 'Email must be a valid email address <br \>';
            }
        }

        if(empty($_POST['title'])){
            echo 'A title is required <br/>';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                // preg_match - perform a regular expression match
                // has 2 parameters - (pattern_to_search_for, input_string)
                echo 'Title must be letters and spaces only <br \>';
            }
        }

        if(empty($_POST['ingredients'])){
            echo 'Ingredients are required <br/>';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                echo 'Ingredients must be comma separated list only';
        }
    } 
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <input type="email" name="email" class="validate">
        <label for="email">Your Email: </label>
        <input type="text" name="title" class="validate">
        <label for="title">Pizza Title: </label>
        <input type="text" name="ingredients" class="validate">
        <label for="ingredients">Ingredients (comma separated): </label>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>


</html>