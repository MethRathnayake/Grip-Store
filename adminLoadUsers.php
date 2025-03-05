<?php

include "connection.php";

$rs = Database::search("SELECT * FROM `user`");
$num = $rs->num_rows;
for ($i = 0; $i < $num; $i++) {

    $d = $rs->fetch_assoc();

?>

    <tr>
        <th scope="row"><?php echo ($d['id']) ?></th>
        <td><?php echo ($d['name']) ?></td>
        <td><?php echo ($d['mobile']) ?></td>
        <td><?php echo ($d['email']) ?></td>
        <td><?php echo ($d['username']) ?></td>
        <td><?php echo ($d['date']) ?></td>
        <td><?php if ($d['status_id'] == 1) {
                echo "<span style='color:green; font-weight:bold;'> Active </span>";
            } else {
                echo "<span style='color:red; font-weight:bold;'> Inactive </span>";
            }


            ?></td>


    </tr>


<?php
}


?>