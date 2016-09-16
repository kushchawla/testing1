<?php

if(empty($post))
{
	echo __('<div>No post found</div>');
}else
{	
	echo "<strong>".$post['Post']['title'].'</strong><br>';
	echo '<p>'.$post['Post']['body'].'</p>';
	echo '<p>'.$this->Html->link('Edit',
								 array('action'=>'edit',
								 		$post['Post']['id']
								 	  )
								 )." ".$this->Html->link('Delete',
								 						  array('action'=>'delete', 
								 						  		 $post['Post']['id']
								 							   )
								 						).'</p>';
}

// show related posts here
?>