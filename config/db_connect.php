<?php

$connect = mysqli_connect('localhost', 'phil', 'test1', 'php_pizza');

    if (!$connect) {
        echo 'Connection error: '.mysqli_connect_error();
    }