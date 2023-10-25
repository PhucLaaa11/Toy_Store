<!-- Search -->
<?php
require_once('header.php');
require_once('connect.php');
?>

<?php
if (isset($_COOKIE['cc_username'])) {
    $account = $_COOKIE['cc_username'];
} else {
    header("Location: login.php");
}
?>

<div class="container my-3">
    <div class="row d-flex justify-content-center align-items-center p-3">
        <div class="col-md-8">
            <form action="search.php" class="search d-flex" role="search">
                <input type="search" class="form-control me-2" placeholder="Search..." name="search" aria-label="search">

                <button class="btn btn-outline-success" name="btnSearch" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row mx-auto">
        <?php
        $c = new Connect();
        $dblink = $c->connectToPDO();

        if (isset($_GET['search'])) {
            $nameS = $_GET['search'];
        } else {
            $nameS = "";
        }

        $sql = "SELECT * FROM product WHERE pname LIKE ?";
        $re = $dblink->prepare($sql);
        //Dieu kien like
        $valueArray = ["%$nameS%"];
        $re->execute($valueArray);
        //fetchAll lay toan bo
        $row = $re->fetchAll(PDO::FETCH_BOTH);
        if ($re->rowCount() > 0) {
            foreach ($row as $r) :
        ?>
                <div class="row card mb-3 col-3 mx-auto" style="width: 18rem;">
                    <img src="img/<?= $r['pimage'] ?>" class="card-img-top my-3" alt="..." style="border: 1px solid black; border-radius: 6px;" with="545px" height="250px">

                    <div class="card-body mx-auto">
                        <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;">
                                <?= $r['pname'] ?>
                            </h6>
                        </a>

                        <p class="card-cost text-center" style="font-weight: bold; font-size: 30px;"><small class="text-muted">
                                <?= $r['pprice'] ?>&#8363;
                            </small></p>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        <?php
        } else {
            echo "Nothing";
        }
        ?>
    </div>
</div>

<?php
require_once('footer.php');
?>