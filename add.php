<?php 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    

    // REDIRECTING

    // if there are no errors from the form fields then we want to redirect to the home page
    // you'll need to use a conditional statement to check if any errors exist
    // to do so, you will need to check the $error_array if there are any empty strings
    // if not then redirect to the home page

    $email = $title = $ingredients = '';
    $error = [
        'email' => '',
        'title' => '',
        'ingredients' => ''
    ];

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
    

    if(array_filter($error)){
        // array_filter - filters elements of an array using a callback function
        // iterates over each value in the array passing them to the callback function 
        // If the callback function returns TRUE, the current value from array is returned into the result array
        echo 'Errors in the form';
    } else {
        echo 'Form is valid';
        header('Location: index.php');
        // header() - is used to send a raw HTTP header
        // must be called before any actual output is sent, either by normal HTML tags, blank lines in a file, or from PHP
        // very common error to read code with include, or require, functions, or another file access function, and have spaces or empty lines that are output before header() is called
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <input type="email" name="email" class="validate" value="<?php echo htmlspecialchars($email) ?>">
        <label for="email">Your Email: </label>
        <div class="red-text"><?php echo $error['email']; ?></div>
        <input type="text" name="title" class="validate" value="<?php echo htmlspecialchars($title) ?>">
        <label for="title">Pizza Title: </label>
        <div class="red-text"><?php echo $error['title']; ?></div>
        <input type="text" name="ingredients" class="validate" value="<?php echo htmlspecialchars($ingredients) ?>">
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