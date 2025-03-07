<?php

include "connection.php";


//search query for our product data
$q = "SELECT * FROM `watchlist` INNER JOIN `stock` ON `watchlist`.`stock_id` = `stock`.`stock_id` 
        INNER JOIN `product` ON `stock`.`product_id` = `product`.`product_id` 
        INNER JOIN `product_type` ON `product`.product_type_id = `product_type`.product_type_id 
        ORDER BY `stock`.`stock_id` ASC";

$rs = Database::search($q);
$num = $rs->num_rows;




if ($num == 0) {
    echo "No Product Found";
} else {
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

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
}

?>