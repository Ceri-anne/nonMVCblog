<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Db\delete_comment;
use function Blog\Db\delete_userid;



?>

<?= display('__header'); ?> 

<?php if (isset($_GET['comment_id'])): ?>

    <?php $comment_id =filter_var($_GET['comment_id'],FILTER_SANITIZE_SPECIAL_CHARS); ?>
    <a href="deleteuser.php"></a>
    <?php delete_comment($pdo, $comment_id); ?>
    <?= "Comment deleted"; ?>


<?php elseif (isset($_GET['user_id'])): ?>

    <?php $user_id = filter_var($_GET['user_id'],FILTER_SANITIZE_SPECIAL_CHARS); ?>
    <?php delete_userid($pdo, $user_id); ?>
    <?= "User deleted"; ?>


<?php else: ?>;

    <?= "No action taken" ?>

<?php endif; ?>


<?= display('__footer'); ?>

