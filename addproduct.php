<?php
require_once('header.php');
require_once('connect.php');

if (isset($_COOKIE['cc_username'])) {
    $account = $_COOKIE['cc_username'];
    if (isset($_POST['btnAdd'])) {
        $c = new Connect();
        $dbLink = $c->connectToPDO();

        $id = $_POST['proId'];
        $name = $_POST['proName'];
        $price = $_POST['price'];
        $desc = $_POST['proDes'];
        $importDate = date('Y-m-d', strtotime($_POST['importDate']));
        $quan = $_POST['quan'];
        $cat = $_POST['catId'];

        $img = str_replace(' ', '-', $_FILES['Pro_image']['name']);
        //Duong dan
        $imgdir = './img/';
        $flag = move_uploaded_file(
            $_FILES['Pro_image']['tmp_name'],
            $imgdir . $img
        );

        if ($flag) {
            $sql = "INSERT INTO `product`(`pid`,`pname`, `pprice`, `pquan`, `pdesc`, `pimage`, `pdate`, `catid`) VALUES (?,?,?,?,?,?,?)";
            //$re = $dbLink->prepare($sql);
            //$v = [$name, $price, $quan, $desc, $img, $date, $cat];
            $re = $dbLink->prepare($sql);
            $valueArray = [
                "$id", "$name", "$price", "$desc", "$img", "$importDate", "$cat"
            ];

            $stmt = $re->execute($valueArray);
            if ($stmt) {
                echo "Congrat!";
            }
        } else {
            echo "Failed!";
        }
    }
} else {
    header("Location: login.php");
}
?>

<div class="container">
    <h2>Product Add</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">

        <div class="row mb-3">
            <div class="col-12">
                <label for="proId" class="col-sm-2">Product ID</label>
                <div class="col-sm-10">
                    <input id="proId" type="text" name="proId" class="form-control" placeholder="Product ID" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="proName" class="col-sm-2">Product Name</label>
                <div class="col-sm-10">
                    <input id="proName" type="text" name="proName" class="form-control" placeholder="Product Name" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="price" class="col-sm-2">Price</label>
                <div class="col-sm-10">
                    <input id="price" type="text" name="price" class="form-control" placeholder="Price" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="ProDe" class="col-sm-2">Product Description</label>
                <div class="col-sm-10">
                    <input id="proDes" type="text" name="proDes" class="form-control" placeholder="Product Description" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="importDate" class="col-sm-2">Product Date</label>
                <div class="col-sm-10">
                    <input id="proDate" type="date" name="importDate" class="form-control" placeholder="Import Date" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="quan" class="col-sm-2">Quantity</label>
                <div class="col-sm-10">
                    <input id="quan" type="text" name="quan" class="form-control" placeholder="Quantity" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image-vertical" class="col-sm-2">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="catId" class="col-sm-2">Cat Id</label>
                <div class="col-sm-10">
                    <input id="catId" type="text" name="catId" class="form-control" placeholder="Cat Id" value="">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-2 ms-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="btnAdd" class="btn btn-warning rounded-pill">Add</button>
                </div>
                <div class="col-6 d-grid mx-auto">
                    <button type="reset" name="btnReset" class="btn btn-secondary rounded-pill">Reset</button>
                </div>
            </div>
        </div>

    </form>
</div>


<?php
require_once('footer.php');
?>