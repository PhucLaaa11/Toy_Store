<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1);
    }
</style>

<body>
    <!-- navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="home.php">
                <img src="img/OIP.jpg" width="50px" title="Homepage">
                <class="navbar-brand">Toys Kingdom</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navsup">
                <!-- Left -->
                <div class="navbar-nav">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a href="category.php?cid=1" class="dropdown-item">Lego</a>
                            <a href="category.php?cid=2" class="dropdown-item">Figure</a>
                            <a href="category.php?cid=3" class="dropdown-item">Board game</a>
                        </div>
                    </div>
                    <a href="addproduct.php" class="nav-link">Add Product</a>
                    <a href="search.php" class="nav-link" style="color: #fff;">Search</a>
                </div>
                <!-- Right -->
                <div class="navbar-nav ms-auto">
                    <?php
                    // COOKIE_start();
                    if (isset($_COOKIE['cc_username'])) :
                    ?>
                        <a href="" class="nav-item nav-link">Welcome, <?= $_COOKIE['cc_username'] ?></a>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    <?php
                    else :
                    ?>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="register.php" class="nav-item nav-link">Register</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-lg-5 text-center container" style="background-image:url(img/backgr.jpg)" height: 600px>
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Toys Kingdom</h1>
                <p class="lead text-muted">Explore your creativity!</p>
            </div>
        </div>
    </section>

    <div class="b-example-divider"></div>