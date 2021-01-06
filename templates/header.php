<?php

    // COOKIES
    // Step 1 - checking cookie for gender
    // Step 2 - create cookie
    // Step 3 - get cookie

    session_start();

    $name = $_SESSION['name'] ?? 'Guest';

    if ('no_name' == $_SERVER['QUERY_STRING']) {
        unset($_SESSION['name']);
    }

    $gender = $_COOKIE['gender'] ?? 'Unknown';
    // $_COOKIE - super global; HTTP Cookies
    // an associative array of variables passed to the current script via HTTP Cookies
    // store the cookie to a local variable with a default value
    // if the cookie is not set then it will return 'Unknown'

    // Step 4 - output the cookie value into the HTML template
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
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>