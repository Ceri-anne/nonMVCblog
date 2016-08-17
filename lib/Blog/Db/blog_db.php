<?php

namespace Blog\Db;
use PDO;
	
//USER FUNCTIONS
function read_user($pdo, $username) {
	
        $stmt = $pdo->prepare("SELECT * FROM users where username= :username");
	$stmt->execute(['username' => $username]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
   
}

function read_user_id($pdo, $user_id) {
	
        $stmt = $pdo->prepare("SELECT * FROM users where id= :user_id");
	$stmt->execute(['user_id' => $user_id]);
	$user = $stmt->fetch();
        return $user;
   
}

// BLOG FUNCTIONS
function create_article($pdo, $article) {
    
        $stmt = $pdo->prepare("INSERT INTO articles (title,body ,author,category,status) "
                . "  values (:title, :body , :author, :category, 1)");
       
	$stmt->execute(['title'=>$article['title'],'body'=>$article['body'],'category'=>$article['category'],
                            'author'=>$article['author']]);
	
	return  $count = $pdo->query("SELECT max(id) FROM articles")->fetchColumn();
}

// BLOG FUNCTIONS
function create_user($pdo, $user,$role) {
    
        $stmt = $pdo->prepare("INSERT INTO users (email,firstname,lastname,password,role,username,bio) "
                . "  values (:email, :firstname, :lastname, :password , :role, :username, :bio)");
       
	$stmt->execute(['email'=>$user['email'],'firstname'=>$user['firstname']
                        ,'lastname'=>$user['lastname'],'password'=>password_hash($user['password'],PASSWORD_DEFAULT),
                        'role'=>$role, 'username'=>$user['username'],'bio'=>$user['bio']
                ]);
        return  $count = $pdo->query("SELECT max(id) FROM articles")->fetchColumn();
	
}  
function read_article_id($pdo, $article_id) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id 
                                WHERE a.id = :id");
	$stmt->execute(['id' => $article_id]);
	return $stmt->fetch();
}

function read_most_recent_articles($pdo) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id  ORDER BY modifieddate DESC Limit 3 ");
	$stmt->execute();
        return $stmt->fetchall();
}


function delete_article($pdo, $article_id) {
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
	$stmt->execute(['id' => $article_id]);	
}

function delete_user($pdo, $username) {
	$stmt = $pdo->prepare("DELETE FROM users WHERE username = :username");
	$stmt->execute(['username' => $username]);
}
function delete_userid($pdo, $user_id) {
	$stmt = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
	$stmt->execute(['user_id' => $user_id]);
}
function delete_comment($pdo, $comment_id) {
	$stmt = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
	$stmt->execute(['comment_id' => $comment_id]);
}


function update_article($pdo, $article_id, $new_article) {
	$stmt = $pdo->prepare("UPDATE articles SET title= :title, body = :body "
                . "author = :author, category = :category, status = :status WHERE id = :id");
	$stmt->execute(['id' => $article_id, 'title' => $new_article['title']
                    , 'body'  => $new_article['body'] ,'author' => $new_article['author']
                    ,'category' => $new_article['category'], 'status' => $new_article['status']]);
}

function create_comment($pdo, $comment) {
    
        $stmt = $pdo->prepare("INSERT INTO comments (article_id,user_id ,text) "
                . "  values (:article_id, :user_id , :text)");
       
	$stmt->execute(['text'=>$comment['comment'],'article_id'=>$comment['article_id'],'user_id'=>$comment['user_id']]);
	
	return  $count = $pdo->query("SELECT max(id) FROM comments")->fetchColumn();
}


function read_comments($pdo,$article_id) {
	$stmt = $pdo->prepare("SELECT b.username
                                     ,a.*
                                FROM `comments` a
                                left outer JOIN		
                                        users b
                                ON   a.user_id=b.id
                                WHERE a.article_id=:article_id
                                order by a.id DESC");
	$stmt->execute(['article_id'=>$article_id]);
        return $stmt->fetchall();
}


function read_articles_userid($pdo, $user_id) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id 
                                WHERE b.id = :id");
	$stmt->execute(['id' => $user_id]);
	return $stmt->fetchall();
}




function read_all_articles($pdo) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id ");
	$stmt->execute();
        return $stmt->fetchall();
}

function read_all_users($pdo) {
	$stmt = $pdo->prepare("SELECT *
                                FROM `users` ");
	$stmt->execute();
        return $stmt->fetchall();
}

function read_comment_id($pdo, $comment_id) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `comments` a
                                LEFT OUTER JOIN
                                        users b
                                on a.user_id=b.id 
                                WHERE a.id = :id");
	$stmt->execute(['id' => $comment_id]);
	return $stmt->fetch();
}



function search_articles($pdo, $name) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id 
                                WHERE (a.title like concat('%',:name,'%')
                                OR a.body like concat('%',:name,'%'))");
	$stmt->execute(['name' => $name]);
	return $stmt->fetchAll();
}


function search_articles_category($pdo, $category_id) {
	$stmt = $pdo->prepare("SELECT a.*, b.username
                                FROM `articles` a
                                LEFT OUTER JOIN
                                        users b
                                on a.author=b.id 
                                WHERE a.category= :category_id");
	$stmt->execute(['category_id' => $category_id]);
	return $stmt->fetchAll();
}
