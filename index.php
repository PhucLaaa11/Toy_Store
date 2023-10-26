<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
//Goi ham
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product ORDER BY pdate DESC LIMIT 10';
//Thuc hien truy van
$re = $dbLink->query($sql);

if ($re->num_rows > 0) {
?>
    <div class="container">
        <div class="row mx-auto">
            <?php
            while ($row = $re->fetch_assoc()) {
            ?>
                <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
                    <img src="img/<?= $row['pimage'] ?>" class="card-img-top mt-3" alt="..." style="border: 1px solid black; border-radius: 6px;" with="545px" height="250px">
                    <div class="card-body">

                        <a href="detail.php?id=<?= $row['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;">
                                <?= $row['pname'] ?>
                            </h6>
                        </a>

                        <p class="card-cost text-center mb-3" style="font-weight: bold; font-size: 30px;"><small class="text-muted">
                                <?= $row['pprice'] ?>&#8363;
                            </small></p>
                    </div>
                </div>
        <?php
            } //while
        } //if
        ?>
        </div>
    </div>

    <?php
    require_once('footer.php');
    ?>