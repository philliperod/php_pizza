<?php

// SUPER GLOBALS - $_VARIABLENAME['']
// special arrays in PHP that are pre-populated with values
// by the time you run your code
// examples - $_POST['name], $_GET['name]

echo $_SERVER['SERVER_NAME'].'<br/>';
// this will contain different info about the server
// will need to capitalize inside the brackets

echo $_SERVER['REQUEST_METHOD'].'<br/>';
// check the request method on how this page was obtained

echo $_SERVER['SCRIPT_FILENAME'].'<br/>';
// provides file name path

echo $_SERVER['PHP_SELF'].'<br/>';
// path to the current file relative to the localhost
// example of use - in <form> action, you can use it to refer to its current page
// side note - rewrote the <form> action to use PHP_SELF