<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "select * from tbl_product t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_brand y on y.brand_id=t.brand_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where true ";
        $row = "SELECT count(*) as count from tbl_product t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_brand y on y.brand_id=t.brand_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where true ";

		if ($_GET["sid"]!=null) {

            $sid = $_GET["sid"];

            $sqlQry = $sqlQry." AND t.shop_id =".$sid;
            $row = $row." AND t.shop_id =".$sid;
        }

        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND s.subcategory_id IN(".$subcategory.")";
            $row = $row." AND s.subcategory_id IN(".$subcategory.")";
        }

        if ($_GET["brand"]!=null) {

            $brand = $_GET["brand"];

            $sqlQry = $sqlQry." AND y.brand_id IN(".$brand.")";
            $row = $row." AND y.brand_id IN(".$brand.")";
        }
		
	       if ($_GET["type"]!=null) {

            $type = $_GET["type"];

            $sqlQry = $sqlQry." AND p.type_id IN(".$type.")";
            $row = $row." AND p.type_id IN(".$type.")";
        }
		  // echo $sqlQry;
        $resultS = $conn->query($sqlQry);
        $resultR = $conn->query($row);
     
	 
       
        $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
?>



                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Shop/<?php echo $row1["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcategory_name"]; ?><br>
                                        </p>
                                        <?php
                                           
                                            $stock = "select sum(stock_qty) as stock from tbl_stock where product_id = '" . $row1["product_id"] . "'";
											 $result2 =$conn->query($stock);
                            				$row2=$result2->fetch_assoc();


                                            $stocka = "select sum(cart_qty) as stock from tbl_cart where product_id = '" . $row1["product_id"] . "'";
                                            $result2a = $conn->query($stocka);
                                           $row2a=$result2a->fetch_assoc();

                                           $stock = $row2["stock"] - $row2a["stock"];
										   if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $row1['product_id'] ?>')"  class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock== 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
		} else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }
                        ?>