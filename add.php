<?php 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    

    // THROWING ERRORS

    $error = [
        'email' => '',
        'title' => '',
        'ingredients' => ''
    ];
    // you can create an array for your errors

    if(isset($_POST['submit'])){
        
        if(empty($_POST['email'])){
            $error['email'] = 'An email is required <br/>';
        } else {
            $email = $_POST['email']; 
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Email must be a valid email address <br \>';
            }
        }

        if(empty($_POST['title'])){
            $error['title'] = 'A title is required <br/>';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $error['title'] = 'Title must be letters and spaces only <br \>';
            }
        }

        if(empty($_POST['ingredients'])){
            $error['ingredients'] = 'Ingredients are required <br/>';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $error['ingredients'] = 'Ingredients must be comma separated list only <br \>';
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
        <div class="red-text"><?php echo $error['email']; ?></div>
        <input type="text" name="title" class="validate">
        <label for="title">Pizza Title: </label>
        <div class="red-text"><?php echo $error['title']; ?></div>
        <input type="text" name="ingredients" class="validate">
        <label for="ingredients">Ingredients (comma separated): </label>
        <div class="red-text"><?php echo $error['ingredients']; ?></div>
        <br>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>


</html>