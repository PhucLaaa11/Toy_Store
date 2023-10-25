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
<?php

require_once('connect.php');
if (isset($_POST['btnLogin'])) {
    if (isset($_POST['usrname']) && isset($_POST['password'])) {
        $user = $_POST['usrname'];
        $pwd = $_POST['password'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM user WHERE username = ? and password = ?";
        $stmt = $dblink->prepare($sql);
        $sre = $stmt->execute(array("$user", "$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);

        if ($numrow == 1) {
            echo "Login successfully";
            setcookie("cc_username", $row['username'], time() + 3600);
            // setcookie("cc_id", $row['id'], time()+3600);
            header("Location: home.php");
        } else {
            echo "Something wrong with your info<br>";
        }
    } else {
        echo "please enter your info";
    }
}
?>

</html>

<style>
    h2 {
        text-align: center;
        margin: 20px;
        color: #fff;
        font-size: 50px;
    }

    body {
        background-image: url(https://wallpaperaccess.com/full/1391286.jpg);
    }

    .container {
        padding: 0;
        margin-top: 200px;
    }
</style>

<body>
    <div class="container">
        <h2>Login</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
            <div class="row mb-3 my-auto">
                <div class="d-grid col-4 mx-auto">
                    <input id="username" type="text" name="usrname" class="form-control" value="" placeholder="Username">
                </div>
            </div>

            <div class="row mb-3">
                <div class="d-grid col-4 mx-auto">
                    <input id="password" type="password" name="password" class="form-control" value="" placeholder="Password">
                </div>
            </div>

            <div class="d-grid col-4 mx-auto">
                <div class="form-check d-inline-flex mx-auto">
                    <input id="checkrmb" type="checkbox" name="grpcheckrmb" value="1" class="form-check-input me-3">
                    <label id="check" for="checkrmb" class="form-check-label text-white">Remember me</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-3 mx-auto row">
                    <div class="col-6 d-grid mx-auto"><input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
                    </div>
                    <div class="col-6 d-grid mx-auto"><input type="button" name="btnRegister" value="Register" class="btn btn-primary" onclick="window.location.href='register.php';">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>