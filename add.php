<?php 
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }
    // isset checks if a variable or value has been set
    // $_GET is a global array
    // $_GET['submit'] checks if that value has been initialized (name="submit"); if this has value then it means that it has submitted data to the server 
    // next you want to extract the data (['submit]) you sent with the GET request ($_GET)
    // $_GET['key'] is looking for the key and will pass back the value for that key (key-value pair)
    

    if(isset($_POST['submit'])){
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingredients'];
    }
    // $_POST will be more secured than $_GET
    // difference between the two were the results
    // $_GET showed the data on top of the page and in the search bar
    // $_POST did not show any of that data

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