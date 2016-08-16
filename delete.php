<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Db\delete_comment;
use function Blog\Db\delete_userid;



?>

<?= display('__header'); ?> 

<?php if (isset($_GET['comment_id'])): ?>

    <?php $comment_id = $_GET['comment_id']; ?>
<a href="deleteuser.php"></a>
    <?php delete_comment($pdo, $comment_id); ?>
    <?= "Comment deleted"; ?>


<?php elseif (isset($_GET['user_id'])): ?>

    <?php $user_id = $_GET['user_id']; ?>
    <?php delete_userid($pdo, $user_id); ?>
    <?= "User deleted"; ?>


<?php else: ?>;

    <?= "No action taken" ?>

<?php endif; ?>


<?= display('__footer'); ?>

