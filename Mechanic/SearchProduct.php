<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
   <style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body onload="productCheck()">
        <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <h6 class="text-info"> Select Brand</h6>
                    <ul class="list-group">
                        <?php                           
						 $selbrand = "SELECT * from tbl_brand";
                            $result = $conn->query($selbrand);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" id="brand" value="<?php echo $row["brand_id"]; ?>" ><?php echo $row["brand_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>	
                    </ul>
                    <br>
                    <h6 class="text-info"> Select Type</h6>
                    <ul class="list-group">
                        <?php                           
						 $seltype = "SELECT * from tbl_type";
                            $result = $conn->query($seltype);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" id="type" value="<?php echo $row["type_id"]; ?>" ><?php echo $row["type_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>	
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Category</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_category";
                            $result = $conn->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>	
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Sub Category</h6>
                    <ul class="list-group" id="subcat">
                        <?php                           
						   $selSubCat = "SELECT * from tbl_subcategory";
                           $resultsc = $conn->query($selSubCat);
                            while ($rowsc=$resultsc->fetch_assoc()) {
                        ?>
                         <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onchange="productCheck()" class="form-check-input product_check" value="<?php echo $rowsc["subcategory_id"]; ?>" id="subcategory"><?php echo $rowsc["subcategory_name"]; ?>
                                </label>
                            </div>
                        </li> 
                        <?php
                             }
                        ?>
                    </ul>
                    <br />
                    
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5><a href="MyCart.php"><button >View Cart</button></a>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <input type="hidden" value="<?php echo $_GET["sid"] ?>" id="sid" />
                    <div class="row" id="result">

                    </div>

                </div>

            </div>
                        </div>
<script src="../Assets/Templates/Search/jquery.min.js"></script>
        <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
        <script>


function changeSub()
            {
                var cat = get_filter_text('category');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                        success: function(response) {
                            $("#subcat").html(response);
                        }
                    });

                }
                else
                {
                    $("#subcat").html("");
                }


                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }

            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var subcategory = get_filter_text('subcategory');
					var brand = get_filter_text('brand');
					var type = get_filter_text('type');
					var sid = document.getElementById('sid').value;
				

                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action +"&category=" + category+"&subcategory=" + subcategory + "&brand=" + brand + "&type=" + type+ "&sid=" + sid ,
                        success: function(response) {
							
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>
    <?php
    include("Foot.php");
	?>

</html>