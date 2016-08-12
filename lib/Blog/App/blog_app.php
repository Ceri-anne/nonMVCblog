<?php
namespace Blog\App;

use function Blog\Db\create_article, Blog\Db\read_article_id , Blog\Db\read_most_recent_articles,
        Blog\Db\create_comment;


function add_article($pdo, $article) {
	$new_id = create_article($pdo, $article);
	return ['article' => $article];
}

function get_article($pdo, $id) {
	return ['article' => read_article_id($pdo, $id)];
}

function get_most_recent_articles($pdo) {
	return ['articles' => read_most_recent_articles($pdo)];
}


function add_comment($pdo, $comment,$article_id,$user_id) {
	$new_id = create_comment($pdo,$comment,$article_id,$user_id);
	return ['comment'=>$comment];
}