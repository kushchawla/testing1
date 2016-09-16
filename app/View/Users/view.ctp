<h1><?php echo $user['User']['name'];?></h1>
<p>From: <?php echo $user['User']['address'];?></p>
<p>Posts Created so far:</p>

<?php 

$posts= $user['Post'];
foreach($posts as $post)
	  {
	  	echo "<strong>".$post['title']."</strong>";
	  	echo "<p>".$post['body']."</p>";
	  }

?>