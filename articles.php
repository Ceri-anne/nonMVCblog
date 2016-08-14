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

<?= display('__header'); ?> 

<?php if (empty($articles['articles'])): ?>
 
	<?=  "Sorry, no results found";?>
 
<?php else: ?>
     
      
        <?= display('articles', ['article' => $articles['articles'],'heading'=>$category]); ?>

<?php endif;  ?>

<?= display('__footer'); ?>