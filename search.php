<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
    
$search=filter_var($_POST['name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$articles = \Blog\App\get_search_articles($pdo, $search);

?>

<?php echo display('__header'); ?>

 
 <?php if (empty($articles['articles'])): ?>
 
	<?=  "Sorry, no results found";?>
 
<?php else: ?>
     
<?php echo display('articles', ['article' => $articles['articles']]); ?>

<?php endif;  ?>
 
 

<?php echo display('__footer'); ?>

