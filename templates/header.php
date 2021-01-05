<?php

    session_start();

    $_SESSION['name'] = 'Richard';
    // if you want to override that session variable in a particular file
    // you can assign a value in the same file
    // even if you were to submit a new value for the session variable, it will not change the defined value in that file
    // will need to be placed before the dynamic session variable

    $name = $_SESSION['name'];
    // to acccess the session variable, you will neeed to run session_start()
    // assign the session variable to a local variable that can be accessed in the file

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
    .brand {
        background: #cbb09c !important;
    }

    .brand-text {
        color: #cbb09c !important;
    }

    form {
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
    }

    .heading {
        margin-bottom: 40px;
    }

    .pizza {
        width: 100px;
        margin: 40px auto -50px;
        display: block;
        position: relative;
        top: -80px;
    }

    .pizza-content {
        margin-bottom: 40px;
    }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">PHP Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>