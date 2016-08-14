<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Db\delete_userid;



?>

<?= display('__header'); ?> 

<?php if (isset($_GET['id'])): ?>

    <?php $user_id = $_GET['id']; ?>
    <?php delete_userid($pdo, $user_id); ?>
    <?= "User deleted"; ?>

<?php else: ?>;

    <?= "No action taken" ?>

<?php endif; ?>




<?= display('__footer'); ?>

