<?php
/**
* User Model index page for action:index
*/
?>
<h1 style="display:inline; float:left;">Users</h1><h1 style="display:inline; float:right;"><?php echo $this->Html->link('Add User', array('controller'=>'users', 'action'=>'add'));?></h1>
<?php if(!empty($users)):
$i=1;
	//echo "<pre>"; print_r($users); echo "</pre>";?>

<table>
	<tr>
		<th>Sr. No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Role</th>
		<th>Action</th>
	</tr>
	
		<?php 
			foreach($users as $user)
			{	
				$role ="";
				if($user['User']['role']==1)
					{
						$role = "Administrator";
					}
				elseif($user['User']['role']==2)
					{
						$role = "Editor";	
					}
				else
					{
						$role = "Subscriber";
					}
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$user['User']['name']."</td>";
				echo "<td>".$user['User']['email']."</td>";
				echo "<td>".$user['User']['address']."</td>";
				echo "<td>".$role."</td>";
				echo "<td>";
					echo $this->HTML->link
						(
						'Edit',
						array('controller'=>'users',
							  'action'=>'edit',
							  $user['User']['id']
							  )
						);
					echo "/";
					echo $this->Form->postLink
						(
							'Delete',
							array('controller'=>'users', 'action'=>'delete', $user['User']['id']),
							array('confirm'=>"Are you sure you want to delete this user?")
						);
				echo "</td>";
				echo "</tr>";
				$i++;
			} 
		?>
	
</table>
<?php endif; ?>