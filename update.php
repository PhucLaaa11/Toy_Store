<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proId = $_POST['proId'];
    $name = $_POST['proName'];
    $price = $_POST['price'];
    $importDate = date('Y-m-d', strtotime($_POST['importDate']));
    $cat = $_POST['catId'];
    $store = $_POST['storeId'];
    $img = $_POST['img'];

    $sql = "UPDATE product SET 
            pid = '$proId',
            pname = '$name',
            pprice = '$price',
            pdate = '$importDate',
            catid = '$cat',
            sid = '$store',
            pimage = '$img'
            WHERE pid = $proId";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$pro_id = $_GET['id'];
$sql = "SELECT * FROM product p, store s, category c WHERE p.catid = c.cid AND p.sid = s.sid  AND pid ='$pro_id'";
$re = $blink->query($sql);
$row = $re->fetch_assoc();

?>
<div class="container">
    <form action="#" class="form form-vertical" method="POST" enctype="multipart/form-data"> <!--multipart: upload file
        <!--Product ID-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="proId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Id</label>
                <input type="text" id="proId" name="proId" class="form-control" value="<?= $row['pid'] ?>" placeholder="Product ID" required>
            </div>
        </div>

        <!--Product name-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="proName" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Name</label>
                <input type="text" id="proName" name="proName" class="form-control" value="<?= $row['pname'] ?>" placeholder="Product name" required>
            </div>
        </div>

        <!-- Product Cat  -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="catId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Category</label>
                <select name="catId" id="catId" class="form-select">
                    <option selected value="<?= $row['cid'] ?>"><?= $row['cname'] ?></option>
                    <option value="1">Lego</option>
                    <option value="2">Figure</option>
                    <option value="3">Board game</option>
                </select>
            </div>
        </div>

        <!--Price-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="price" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">
                    Price</label>
                <input type="text" id="price" name="price" class="form-control" value="<?= $row['pprice'] ?>" placeholder="Price" required>
            </div>
        </div>

        <!--Import date-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="importDate" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Import
                    date</label>
                <input type="date" id="importDate" name="importDate" class="form-control" value="<?= $row['pdate'] ?>" placeholder="Import date" required>
            </div>
        </div>

        <!-- Store Id  -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="storeId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Store
                    Id</label>
                <select name="storeId" id="storeId" class="form-select">
                    <option selected value="<?= $row['sid'] ?>"><?= $row['sname'] ?></option>
                    <option value="1">ATN at 30/4 Street, Ninh Kieu District, Can Tho.</option>
                    <option value="2">ATN at 33-35 D4, Tan Hung, 7 District, HCM.</option>
                    <option value="3">ATN at 206G Doi Can, Ba Dinh District, Ha Noi.</option>
                </select>
            </div>
        </div>

        <!--Image-->
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image-vertical" style="font-weight: bold; color: cornflowerblue">Image</label>
                    <input type="text" name="img" id="img" class="form-control" value="<?= $row['pimage'] ?>" required>
                </div>
            </div>
        </div>

        <!--Button-->
        <div class="row mb-3">
            <div class="col-2 mx-auto row">
                <div class="d-grid mx-auto">
                    <button type="submit" name="btnUpdate" class="btn btn-success rounded-pill">Update</button>
                </div>
            </div>
        </div>
    </form>

    <div class="pt-5">
        <h6 class="mb-0">
            <a href="index.php" class="text-body text-decoration-none px-5">
                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
            </a>
        </h6>
    </div>
    
</div>



<?php
require_once('footer.php');
?>