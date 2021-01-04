<?php

    include 'config/db_connect.php';

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
    $result = mysqli_query($connect, $sql);
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($connect);
    explode(',', $pizzas[0]['ingredients']);

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
                        <?php } ?>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text">More Info</a>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<?php include 'templates/footer.php'; ?>


</html>