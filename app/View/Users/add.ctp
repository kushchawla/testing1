<h1>Add new user</h1>
<?php echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('name');
echo $this->Form->input('address');
echo $this->Form->input('email');
echo $this->Form->input('role');
echo $this->Form->end('Submit');
?>