<?php
include_once 'Header.php';
?>
<!-- Sidebar -->
<!-- div content -->
    <div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Category</h1>
        </div>
        <?php
           //put your code here
        include_once './connect.php';
        
        $conn = new Connect();
        $dblink = $conn->connectToPDO();
        if(isset($_POST['txtID']) && isset($_POST['txtName'])):
                $cid = $_POST['txtID'];
                $cname = $_POST['txtName'];

                if(isset($_POST['btnAdd'])): //Add action
                        $sqlInsert = "INSERT INTO `category`(`CatID`, `CatName`) VALUES (?,?)";
                        $stmt = $dblink->prepare($sqlInsert);
                        $execute = $stmt->execute(array("$cid","$cname"));
                        
                        if($execute){
                                header("Location: Category_management.php");
                        }
                        else{
                                echo "Failed".$execute;
                        }
                        
                else:
                    //Update action
                    $sqlUpdate = "UPDATE category SET CatID = ?, CatName = ? WHERE CatID = ?";
                    $stmt = $dblink->prepare($sqlUpdate);
                    $execute = $stmt->execute(array("$cid", "$cname", "$cid"));
                    if($execute){
                        header("Location: Category_management.php");
                    }
                    else{
                        echo "Failed".$execute;
                    }
                endif;
        endif;
        ?>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category ID(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_GET["cid"])?($_GET["cid"]):"";?>'>
                </div>
            </div>

            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value="<?php echo isset($catName)?($catName):"";?>">
                </div>
            </div>

            <div class="form-group pb-3">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" 
                        name="<?php echo isset($_GET["cid"])?"btnEdit":"btnAdd";?>"id="btnAction" 
                        value='<?php echo isset($_GET["cid"])?"Edit":"Add new";?>'>
                    <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Back to list" onclick="window.location.href='./Category_management.php'">
                </div>
            </div>
        </form>
    </div> <!--main-->


