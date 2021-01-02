<?php

    // EXPLODE FUNCTION

    $connect = mysqli_connect('localhost', 'phil', 'test1', 'php_pizza');

    if (!$connect) {
        echo 'Connection error: '.mysqli_connect_error();
    }

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
    $result = mysqli_query($connect, $sql);
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($connect);
    explode(',', $pizzas[0]['ingredients']);
    // explode(separator, string)
    // returns an array of strings created by splitting the STRING parameter on boundaries formed by the SEPARATOR
    // first parameter looks for the specified character then looks for the value before that
    // takes that and puts it in its own position in the array
    // basically this is how we want to split up the string in the array

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
                    <ul>
                        <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) { ?>
                        <li><?php echo htmlspecialchars($ingredient); ?></li>
                        <?php }?>
                        <!-- this is the second argument that will split up the string itself and place each value in its own line item -->
                    </ul>
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