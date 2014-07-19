
<?php
	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	$stmt = $DBH->prepare("INSERT INTO blog_comment(blog_id, comment, post_date,email) 
											VALUES(:blogID, :comment, NOW(), :email)");
	//$stmt = $DBH->prepare("INSERT INTO blog_comment(blog_id, comment, post_date,email) VALUES(13, 'hihi', NOW(), 'cool@gmail.com')");
	
	if (isset($_POST['blogid'])) {
		$blogID = $_POST['blogid'];
	}
	if (isset($_POST['comment'])) {
		$comment = $_POST['comment'];
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	
	$valid = true;
	if(strlen($comment) > 1024){
		$valid = false;
	}
	$cleanBlogID = filter_var($blogID, FILTER_SANITIZE_STRING);
	$cleanBlogID = htmlentities($cleanBlogID);
	
	$cleanComment = filter_var($comment, FILTER_SANITIZE_STRING);
	$cleanComment = htmlentities($cleanComment);
	
	$cleanEmail = filter_var($email, FILTER_SANITIZE_STRING);
	$cleanEmail = htmlentities($cleanEmail);
	
	//$blogID = '1';
	//$comment = 'yo';
	//$email = 'cool';

	$stmt->bindValue(':blogID', $cleanBlogID, PDO::PARAM_INT);
	$stmt->bindValue(':comment', $cleanComment, PDO::PARAM_STR);
	$stmt->bindValue(':email', $cleanEmail, PDO::PARAM_STR);
	
	//$status = [{"status" : "good" }];
	$stmt->execute();
	
	/*
	if($valid == true){
		$stmt->execute();
		echo [{"status" : "good" }];
	}else{
		echo [{"status" : "bad" }];
	}
	*/
	
	

?>

