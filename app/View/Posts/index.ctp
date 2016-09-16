<?php

if(empty($posts))
{
	echo __('<div>No posts found</div>');
}else
{	
	echo '<ul>';
	foreach($posts as $post){
	echo	'<li>'.$this->Html->link($post['Post']['title'],
									 array('controller'=>'posts',
											'action'=>'view', 
											$post['Post']['id']
										  )								 
									).'<br>';
	echo		'<p>'.$post['Post']['body'].'</p>';
	echo	'</li>';
	}
	echo '</ul>';
}
?>