<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;
use function Blog\App\get_articles_category;

require_login();
    
$category = $_GET['category'] ?? 1;
$category_id=array_search($category,CATEGORIES);

$articles = get_articles_category($pdo, $category_id);
?>

<?php echo display('__header'); ?> 

<?php if (empty($articles['articles'])): ?>
 
	<?=  "Sorry, no results found";?>
 
<?php else: ?>
     
<h1><?= $category ?></h1>
<?php echo display('articles', ['article' => $articles['articles']]); ?>

<?php endif;  ?>

<?php echo display('__footer'); ?>