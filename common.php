<!--Contains DB connection and constants-->

<?php

include 'lib/Blog/App/blog_app.php';
include 'lib/Blog/View/blog_view.php';
include 'lib/Blog/Auth/blog_auth.php';
include 'lib/Blog/Upload/blog_upload.php';
include 'lib/Blog/Db/blog_db.php';

const DB_DSN = 'mysql:host=localhost;dbname=blog';
const DB_USER = 'admin';
const DB_PASS = 'Cook!e5@?';
const DEFAULT_ARTICLE_ID = 1;
const CATEGORIES = ['Sport','Technology','Fashion','Business','Politics','Entertainment'];
const ROLES = ['admin','user'];

try {
      $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);


$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$users = $pdo->query("SELECT * FROM users")->fetch(PDO::FETCH_ASSOC);
$articles = $pdo->query("SELECT * FROM articles")->fetch(PDO::FETCH_ASSOC);

        
        
} catch (PDOException $e) {
	die($e->getMessage());
}
set_error_handler(function ($errorType, $errorMessage) {
    
  // 	add a call to view error.phtml here?
    echo $errorMessage;
}
)
;


