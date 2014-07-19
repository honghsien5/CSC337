<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Article Page";
	include 'filler/header.php';
?>

<?php
	//blog article
	if (isset($_GET['blog'])) {
		$blogTitle = $_GET['blog'];
	}
	
	$cleanBlogTitle = filter_var($blogTitle, FILTER_SANITIZE_STRING);
	$cleanBlogTitle = htmlentities($cleanBlogTitle);

	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	$stmt = $DBH -> prepare("SELECT * FROM blog WHERE title = :ptitle");
	$stmt -> bindValue(':ptitle', $cleanBlogTitle, PDO::PARAM_STR); 
	$stmt -> execute();
	$blog = $stmt -> fetch();
	$blogTitle = str_replace('-', ' ', $blogTitle); //might need fixes

?>

<?php
	$blog_id = $blog['id'];
	//comment
	$stmt = $DBH -> prepare("SELECT * FROM blog_comment WHERE blog_id = $blog_id"); // need blog specific comment
	$stmt->execute();
	$comments = $stmt -> fetchAll();
?>



<main id="main">
	<div id="blogArticle">
		
		<h1><?php echo $blog['title']; ?></h1>
		<img src="images/blogs/<?php echo $blog['image']; ?>" alt="<?php echo $blog['title']; ?> article" >
		<p class=date><?php echo $blog['post_date']; ?></p>
		<?php echo $blog['blog']; ?>
	</div>

	<h2>Comment</h2>
	<div id="blog-comments">
		<?php
			foreach ($comments as $comment){
				$str = $comment['email'];
				$position = strpos($str, "@");
				if($position != 0){
					$str = substr($str,0,$position);
				}
				echo '<div class="comment">';
				echo '<div class="commentOwner">' . $str . '</div>';
				echo '<div class="commentDate">' . $comment['post_date'] . '</div>';
				echo '<div class="commentBody">' . $comment['comment'] . '</div>';
				echo '</div>';
			}
		?>
	</div>
	<div id="addCommentForm">
		
		<h2>Add Comment</h2>
		<fieldset>
			<legend>Add Comment to Article</legend>
			<form>
				Email: <input id = "commentEmail" type="text" name="email">
			</form>
			<form>
				Comment<br>
				<textarea id="commentTextBox" name="comment"></textarea>
			</form>
			
			<input id="addComment" onclick="addComment()" type="submit" value="Add Comment" />
		</fieldset>
	</div>


	
</main>

<script>
		// on article.php
		//add comment to article
		function addComment(){

		var valid=true;
		var error = "";
		//check email
		var email= $("#commentEmail").val();
		var atpos= email.indexOf("@");
		var dotpos= email.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
		{
			error+="Not a valid e-mail address\n";
			valid=false;
		}
		//check comment
		var comment= $("#commentTextBox").val();
		if(comment==""){
			error+="Not a valid comment\n";
			valid=false;
		}

		if(valid==false){
			alert(error);
		}else{
			$.post("control/postcomment.php", {email: email, comment: comment, blogid: <?php echo $blog['id']; ?> }, function(data){
			
			/*
			var status = <?php echo json_encode($status); ?>;
			if(status['status'] == "good"){
				
				console.log("good");
				
			}
			*/

			
			var str = $("#commentEmail").val();
			str = str.substring(0,str.indexOf("@"));
			$("#blog-comments").append('<div class="commentOwner">' + str + '</div>');
			$("#blog-comments").append("\n");
			var temp = new Date();
			console.log(temp);
			var day = temp.getDate();
			var month = temp.getMonth() +1;
			var year = temp.getYear()+1900;
			$("#blog-comments").append( '<div class="commentDate">'+ year +'-' + month+'-' + day + '</div>');
			$("#blog-comments").append('<div class="commentBody">' + $("#commentTextBox").val() + '</div>');
			$("#commentEmail").val('');
			$("#commentTextBox").val('');
			console.log("good");
			
			

			
			
			
			
			});
		}
		

	}
</script>

<?php
	include 'filler/footer.php';
?>