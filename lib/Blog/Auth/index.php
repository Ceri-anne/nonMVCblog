<?php include 'common.php' ;


use function Blog\View\display;



$username= $_SESSION['username'] ?? $_GET['username'] ?? 'Guest';

$user = $_SESSION['user'] ?? 'Guest';

?>


<?php include '__header.php' ?>

<p>Welcome <?= $username ?></p><br>


    <?php echo display('articles', ['articles' => $articles]); ?>


<?php  include '__footer.php'; ?>