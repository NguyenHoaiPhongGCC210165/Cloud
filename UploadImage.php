<?php
    include_once './Header.php';
    include_once './connect.php';

    if(isset($_POST['btnSubmit'])){
        $pID = $_POST['pID'];
        $pName = $_POST['pName'];
        $pImg = str_replace(' ','-',$_FILES['Pro_image']['name']);
        $pQuantity = $_POST['pQuantity'];
        $pPrice = $_POST['Price'];
        $eID = $_POST['eID'];
        $cID = $_POST['cID'];
        $supID = $_POST['supID'];

        /*lưu ảnh trong project, không lưu trong ổ c,d */
        $storedImage = "../Images/";

        $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'],$storedImage.$pImg);
        if($flag){
            $c = new Connect();
            $dblink = $c -> connectToPDO();

            $sql="INSERT INTO `product`(`pID`, `pName`, `pPrice`, `pStatus`, `pImage`, `pDesc`, `pQuantity`, `pCatID`) 
                VALUES(?,?,?,?,?,?,?,?)";
            $re = $dblink->prepare($sql);
            $stmt = $re->execute(array("$pID", "$pName", $Price, $Status, "$pImg", $Desc, $Quantity, "$Cat"));

            // $sql = "INSERT INTO `image`(`iImage`) VALUES (?)";
            // $re = $dblink->prepare($sql);
            // $stmt = $re->execute(array("$pImg"));

            if($stmt == TRUE)
            {
                echo "Success!";
            }else{
                echo "Failed";
            }
        }
    }

?>
<div id="main" class="container mt-4">     
                        <form class="form form-vertical" method="POST" action="#"  
                        enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Product ID</label>
                                        <input type="text" class="form-control" name="pID" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="pName" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical">Image</label>
                                            <input type="file" name="Pro_image" id="Pro_image" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="pQuantity" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="pPrice" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Employee Name</label>
                                        <input type="text" class="form-control" name="eID" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                                        <input type="text" class="form-control" name="cID" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                        <input type="text" class="form-control" name="supID" id="exampleFormControlInput1" placeholder="">
                                    </div>
                                    <div class="col-12 d-flex mt-3 justify-content-center">
                                        <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" 
                                        name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
    </div> <!--main-->

<?php
    include_once 'Footer.php';
?>