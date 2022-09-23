<?php
    // THIS SCRIPT HANDLES THE CONNECTION TO THE DATABASE

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'quizzerist_db';

    $con = mysqli_connect($hostname, $username, $password, $dbname)
        or die(mysqli_error($con));