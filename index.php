<?php

    // RENDERING DATA TO THE BROWSER
    // attempting to output to a template on the browser
    // will output $pizzas

    $connect = mysqli_connect('localhost', 'phil', 'test1', 'php_pizza');

    if (!$connect) {
        echo 'Connection error: '.mysqli_connect_error();
    }

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
    $result = mysqli_query($connect, $sql);
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza) { ?>
        <div class="col s12 m4 l3">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                    <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
                </div>
                <div class="card-action right-align">
                    <a href="#" class="brand-text">More Info</a>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<?php include 'templates/footer.php'; ?>


</html>