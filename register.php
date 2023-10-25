<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnRegister'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $user = $_POST['usrname'];
    $pass = $_POST['pwd'];
    $phonenum = $_POST['txtPhone'];
    $emaill = $_POST['txtEmail'];
    $gender = $_POST['grGender'];
    $ht = $_POST['hometown'];
    
    $sql = "INSERT INTO `user`(`username`, `password`, `gender`, `phone`, `email`, `hometown`) VALUES(?,?,?,?,?,?)";

    $re = $dbLink -> prepare($sql);
    $valueArray = [
            "$user", "$pass", $gender, "$phonenum", "$emaill", "$ht"     
    ];
    $stmt = $re->execute($valueArray);
    if($stmt){
        echo "Congrats";
    }else{
        echo "Failed";
    }
}
?>
        <div class="container">
            <h2>Member Registration</h2>
            <form id="formreg" class="formreg" action="" name="formreg" role="form" method="POST">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2">Username:</label>
                    <div class="col-sm-10">
                        <input id="username" type="text" name="usrname" class="form-control" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2">Password:</label>
                    <div class="col-sm-10">
                        <input id="pwd" type="password" name="pwd" class="form-control" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for ="pwd2" class="col-sm-2">Confirm Password:</label>
                    <div class="col-sm-10">
                        <input id="pwd2" type="password" name="pwd2" class="form-control" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gender" class="col-sm-2">Gender:</label>
                    <div class="col-sm-10 my-auto">
                        <div class="form-check d-inline-flex pe-3">
                            <input id="rdMale" type="radio" name="grGender" value="0" class="form-check-input">
                            <label class="form-check-label" for="rdMale">Male</label>
                        </div>

                        <div class="form-check d-inline-flex">
                            <input id="rdFemale" type="radio" name="grGender" value="1" class="form-check-input">
                            <label class="form-check-label" for="rdFemale">Female</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="txtPhone" class="col-sm-2">Phone:</label>
                    <div class="col-sm-10">
                        <input id="txtPhone" type="text" name="txtPhone" class="form-control" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <lable for="txtEmail" class="col-sm-2">Email:</lable>
                    <div class="col-sm-10">
                        <input id="txtEmail" type="email" name="txtEmail" class="form-control" value="">
                </div>

                <div class="row mb-3">
                    <!--div class="ms-auto col-sm-10"-->
                    <div class="d-grid col-sm-2 mx-auto">
                        <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
<?php
require_once('footer.php');
?>