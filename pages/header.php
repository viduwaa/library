<?php
include(dirname(__DIR__) . '../database/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/library/css/style.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div>
            <img class="logo" src="/library/assets/logo_placeholder.png" alt="logo">
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="/library/index.php">Home <img class="nav-img" src="/library/assets/icons/home.png" alt="home"></a></li>

                <li>
                    <input type="checkbox" name="accordion" id="user-manag" checked>
                    <label for="user-manag">User Management</label>

                    <div class="drop-down">
                        <a href="/library/pages/new_user.php">
                            <p>Register New User <img class="nav-img" src="/library/assets/icons/add-user.png" alt="add-user"></p>
                        </a>
                        <a href="/library/pages/search_user.php">
                            <p>Search for User <img class="nav-img" src="/library/assets/icons/search-user.png" alt="search-user"></p>
                        </a>
                    </div>
                </li>

                <li>
                    <input type="checkbox" name="accordion" id="book-manag" checked>
                    <label for="book-manag">Book Management</label>

                    <div class="drop-down">
                        <a href="/library/pages/new_book.php">
                            <p>Register New Book <img class="nav-img" src="/library/assets/icons/open-book.png" alt="register book"></p>
                        </a>
                        <a href="/library/pages/search_books.php">
                            <p>Search for Book <img class="nav-img" src="/library/assets/icons/book.png" alt="book search"></p>
                        </a>
                    </div>
                </li>

                <li>
                    <input type="checkbox" name="accordion" id="book-lending" checked>
                    <label for="book-lending">Book Lending</label>

                    <div class="drop-down">
                        <a href="/library/pages/borrowing.php">
                            <p>Book Borrowing <img class="nav-img" src="/library/assets/icons/lending.png" alt="add-user"></p>
                        </a>
                        <a href="/library/pages/recieving.php">
                            <p>Book Recieving <img class="nav-img" src="/library/assets/icons/recieve.png" alt="search-user"></p>
                        </a>
                    </div>
                </li>


            </ul>

            <ul class="about-us">
                <li><a href="login.php">About Us</a></li>
            </ul>
        </nav>
    </div>