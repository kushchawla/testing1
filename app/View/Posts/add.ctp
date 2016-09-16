<h1>Add New Post</h1>
<?php
echo $this->Form->create();
echo $this->Form->input('title');
echo $this->Form->input('body');
echo $this->Form->end('Publish');?>