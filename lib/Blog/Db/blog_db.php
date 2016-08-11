<?php

namespace Blog\Db;
use PDO;
	
//USER FUNCTIONS
function read_user($pdo, $username, $password) {
	
        $stmt = $pdo->prepare("SELECT * FROM users where username= :username and password = :password");
	$stmt->execute(['username' => $username, 'password' => $password]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
   
}

// BLOG FUNCTIONS
function create_article($pdo, $article) {
    
        $stmt = $pdo->prepare("INSERT INTO articles (title,body ,author,category,status) "
                . "  values (:title, :body , 1, :category, 1)");
       
	$stmt->execute(['title'=>$article['title'],'body'=>$article['body'],'category'=>$article['category']]);
	
	return  $count = $pdo->query("SELECT count(*) FROM articles")->fetchColumn() - 1;
}

// BLOG FUNCTIONS
function create_user($pdo, $user,$role) {
    
        $stmt = $pdo->prepare("INSERT INTO users (email,firstname,lastname,password,role,username) "
                . "  values (:email, :firstname, :lastname, :password , :role, :username)");
       
	$stmt->execute(['email'=>$user['email'],'firstname'=>$user['firstname']
                        ,'lastname'=>$user['lastname'],'password'=>$user['password'], 'role'=>$role, 'username'=>$user['username']
                ]);
	
}

function read_article_id($pdo, $article_id) {
	$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
	$stmt->execute(['id' => $article_id]);
	return $stmt->fetch();
}

function read_most_recent_articles($pdo) {
	$stmt = $pdo->prepare("SELECT * FROM articles ORDER BY modifieddate DESC Limit 3 ");
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

function update_article($pdo, $article_id, $new_article) {
	$stmt = $pdo->prepare("UPDATE articles SET title= :title, body = :body "
                . "author = :author, category = :category, status = :status WHERE id = :id");
	$stmt->execute(['id' => $article_id, 'title' => $new_article['title']
                    , 'body'  => $new_article['body'] ,'author' => $new_article['author']
                    ,'category' => $new_article['category'], 'status' => $new_article['status']]);
}
