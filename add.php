<?php 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    

    // SERVER SIDE VALIDATION

    if(isset($_POST['submit'])){
        // checking if the form has been submitted and have data
     
        // check email field
        if(empty($_POST['email'])){
            // empty() - determine whether a variable is empty
            echo 'An email is required <br/>';
        } else {
            echo htmlspecialchars($_POST['email']);
            // escaping any malicious code found in the form field
        }

        // check title field
        if(empty($_POST['title'])){
            // empty() - determine whether a variable is empty
            echo 'A title is required <br/>';
        } else {
            echo htmlspecialchars($_POST['title']);
            // escaping any malicious code found in the form field
        }

        // check ingredients field
        if(empty($_POST['ingredients'])){
            // empty() - determine whether a variable is empty
            echo 'Ingredients are required <br/>';
        } else {
            echo htmlspecialchars($_POST['ingredients']);
            // escaping any malicious code found in the form field
        }
    } // end of POST check

    

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