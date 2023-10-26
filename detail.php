<?php
require_once('header.php');
include_once('connect.php');

$c = new Connect();
$dbLink = $c->connectToMySQL();
?>

<?php
if (isset($_GET['del_id'])) {
    $delete_id = $_GET['del_id'];
    $delete_Sql = "DELETE FROM product WHERE pid = ?";
    $deleteStmt = $dbLink->prepare($delete_Sql);
    $deleteStmt->bind_param("i", $delete_id);

    if ($deleteStmt->execute()) {
        echo "Product has been deleted!";
    } else {
        echo "Product delete failed!";
    }
}

if (isset($_COOKIE['cc_username'])) {
    $account = $_COOKIE['cc_username'];
} else {
    header('Location: login.php');
}

?>
<div class="container">
    <?php
    if (isset($_GET['id'])) :
        $pid = $_GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql = "select * from product where pid = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
        <div class="col-md-4 pb-3 mx-auto">
            <div class="card mx-auto">
                <img src="img/<?= $re['pimage'] ?>" class="card-img-top my-2" alt="Product1" style="margin: auto; width: 300px;" />
                <div class="card-body">
                    <a href="detail.php?id=<?= $re['pid'] ?>" class="text-decoration-none">
                        <h5 class="card-title"><?= $re['pname'] ?></h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Price: <span style="color:black"><?= $re['pprice'] ?>&#8363;</span>
                        <br>
                        Cat: <?= $re['catid'] ?>
                        <br>
                        Quantity: <?= $re['pquan'] ?>
                        <br>
                        Description: <?= $re['pdesc'] ?></span>
                    </h6>
                </div>

                <form action="cart.php" method="GET">
                    <div class="mx-auto">
                        <input type="hidden" name="pid" value="<?= $pid ?>">
                        <button type="submit" name="btnUpdate" class="btn btn-success my-3 mx-auto">
                            <a href="update.php?id=<?= $re['pid'] ?>" class="text-decoration-none text-white">Update<i class="fa-solid fa-pen-to-square"></i></i></a>
                        </button>
                        <button type="submit" name="btnDelete" class="btn btn-danger my-3 mx-auto">
                            <a href="?del_id=<?= $re['pid'] ?>" class="text-decoration-none text-white">Delete
                                <i class="fa-solid fa-trash"></i></a>
                        </button>
                        <button type="submit" name="btnAddToCart" class="btn btn-warning my-3">
                            <a href="cart.php?id=<?= $re['pid'] ?>" class="text-decoration-none text-black">Add to cart<i class="fas fa-shopping-cart"></i></a>
                        </button>
                    </div>
                </form>
                <div class="pt-2">
                    <h6 class="mb-3">
                        <a href="index.php" class="text-body text-decoration-none px-5">
                            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                        </a>
                    </h6>
                </div>
            <?php
        else :
            ?>
                <h2>Nothing to show</h2>
                <div class="pt-5">
                    <h6 class="mb-0">
                        <a href="index.php" class="text-body text-decoration-none px-5">
                            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                        </a>
                    </h6>
                </div>
            <?php
        endif;
            ?>
            </div>
            <?php
            include_once 'footer.php';
            ?>