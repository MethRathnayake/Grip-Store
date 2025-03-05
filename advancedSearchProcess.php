<?php

include "connection.php";

$page = $_POST["p"];

$brand = $_POST["b"];
$category = $_POST["ct"];
$product_type = $_POST["pt"];
$color = $_POST["c"];

$min = $_POST["min"];
$max = $_POST["max"];


// echo $brand;
// echo $size;
// echo $category;
// echo $color;
// echo $min;
// echo $max;
// echo $page;


$pageNo = 0;

$status = 0;

if (0 != $page) {
    $pageNo = $page;
} else {
    $pageNo = 1;
}



$q = "SELECT * FROM `stock`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`product_id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
INNER JOIN `product_type` ON `product`.`product_type_id` = `product_type`.`product_type_id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`";



//search by brand
if ($status == 0 && $brand != 0) {
    $q .= "WHERE `brand`.`brand_id` = '" . $brand . "' ";
    $status = 1;
} else if ($status != 0 && $brand != 0) {

    $q .= " AND `brand`.`brand_id` = '" . $brand . "' ";
}

//search by category
if ($status == 0 && $category != 0) {
    $q .= " WHERE `category`.`category_id` = '" . $category . "' ";
    $status = 1;
} else if ($status != 0 && $category != 0) {
    $q .= " AND `category`.`category_id` = '" . $category . "' ";
}



//search by size
if ($status == 0 && $product_type != 0) {
    $q .= " WHERE `product_type`.`product_type_id` = '" . $product_type . "' ";
    $status = 1;
} else if ($status != 0 && $product_type != 0) {
    $q .= " AND `product_type`.`product_type_id` = '" . $product_type . "' ";
}


//search by color
if ($status == 0 && $color != 0) {
    $q .= " WHERE `color`.`color_id` = '" . $color . "' ";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    $q .= " AND `color`.`color_id` = '" . $color . "' ";
}



//search by max
if (!empty($max) && empty($min)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $max . "' ORDER BY `stock`.`price` DESC ";
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $max . "' ORDER BY `stock`.`price` DESC ";
    }
}




//search by min
if (!empty($min) && empty($max)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $min . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $min . "' ORDER BY `stock`.`price` ASC ";
    }
}

//search by min & max price range
if (!empty($min) && !empty($max)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC ";
    }
}



//after query execute
$rs = Database::search($q);
$num = $rs->num_rows;

//plagination
$result_per_page = 12;
$num_of_pages = ceil($num / $result_per_page);

$page_result = ($pageNo - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";

$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

//if have or not search result
if ($num2 == 0) {
    //no founf data
?>
    <div class="container text-center">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <h4 class="text-info">No Search Result</h4>
                <p>Oops.. We're Sorry! We cannot find any items for your input data.</p>
            </div>
        </div>
    </div>



    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>

        <div class="group relative">
            <img src="<?php echo $d["path"];  ?>" alt="" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="singleProductView.php?s= <?php echo $d["stock_id"]; ?>">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            <?php echo $d["product_name"]; ?>
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500"><?php echo $d["product_type"]; ?></p>
                </div>
                <p class="text-sm font-medium text-gray-900">Rs.<?php echo $d["price"]; ?></p>
            </div>
        </div>





    <?php
    }
    ?>
    <!-- Pagination -->

    
    <div class="col-span-full flex justify-center mt-4" style="cursor: pointer;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Previous button -->
                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pageNo <= 1) {
                                                echo "#";
                                            } else {
                                            ?> onclick="advanceSearch(<?php echo ($pageNo - 1); ?>);" <?php
                                                                                } ?>>Previous</a>
                </li>

                <!-- Button Count -->
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageNo) {
                ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advanceSearch(<?php echo $y; ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advanceSearch(<?php echo $y; ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <!-- Next button -->
                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pageNo >= $num_of_pages) {
                                                echo "#";
                                            } else {
                                            ?> onclick="advanceSearch(<?php echo ($pageNo + 1); ?>);" <?php
                                                                                } ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
<?php
}



?>