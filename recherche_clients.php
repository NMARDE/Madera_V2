<?php
session_start();

require_once('DAO.php');

if(isset($_GET['client'])) {

    foreach ($array as $r)
    {
        ?>
        <div><?= $r[0] ?> </div>
        <td><?=$r[1] ?></td></tr>
        <?php
    }

}
?>