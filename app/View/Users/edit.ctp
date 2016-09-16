<?php
/**
* User Model edit page for action:edit
*/
?>
<h1>Edit User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->input('role');
echo $this->Form->end('Save information');?>