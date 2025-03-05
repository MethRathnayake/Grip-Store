<?php

include "connection.php";

$page = $_POST["p"];
$pageNo = 0;


// echo("Page Number :" .$page);

if (0 != $page) {
    $pageNo = $page;
} else {
    $pageNo = 1;
}

//search query for our product data
$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`product_id` INNER JOIN `product_type` ON `product`.product_type_id = `product_type`.product_type_id ORDER BY `stock`.`stock_id` ASC ";
$rs = Database::search($q);
$num = $rs->num_rows;

// echo $num;
//paiganation

$result_per_page = 12;
$num_of_pages = ceil($num / $result_per_page);
// echo($num_of_pages);

$page_result = ($pageNo - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;


if ($num2 == 0) {
    echo "No Product Found";
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

    <div class="col-span-full flex justify-center mt-4" style="cursor: pointer;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Previous button -->
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageNo <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="productLoad(<?php echo ($pageNo - 1) ?>);" <?php
                                                                                                                            } ?>>Previous</a></li>

                <!-- Button Count -->
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageNo) {
                ?>
                        <li class="page-item">
                            <a class="page-link" onclick="productLoad(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="productLoad(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                <?php
                    }
                }


                ?>



                <!-- Next button -->
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageNo >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="productLoad(<?php echo ($pageNo + 1) ?>);" <?php
                                                                                                                            } ?>>Next</a></li>
            </ul>
        </nav>
    </div>





<?php

}

?>