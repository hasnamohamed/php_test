<?php
require('helpers/format_helper.php');
require('config/config.php');
require('library/connection.php');
$db = new Database();
?>
<!doctype html>
<html lang="en">
<html>

<head>
    <meta charset="utf-8">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <title><?php echo $GLOBALS["myvar"]; ?> </title>
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="index.php">Test Blog</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <?php if ($_SESSION['email']) : ?>
                        <div class="alert alert-secondary">
                            Hello <?php echo $name; ?>
                            <a class="btn btn-sm btn-outline-secondary" href="logout.php">Logout</a>
                        </div>
                    <?php else : ?>
                        <a class="btn btn-sm btn-outline-secondary" href="login.php">Sign in</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="index.php">Home</a>
                <a class="p-2 text-muted" href="posts.php">All Posts</a>
            </nav>
        </div>

        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">This Is Test Blog Write What You Want</h1>
            </div>
        </div>
    </div>
    <main role="main" class="container">

        <div class="row">
            <div class="col-md-8 blog-main">
                <?php
                if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];  ?></div>
                <?php
                    unset($_SESSION['success']);
                endif
                ?>
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>