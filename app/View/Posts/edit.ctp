<?php
//edit post

echo $this->form->create();
echo $this->form->input('title', array('id' => '', 'class'=>'', 'label' => false));
echo $this->form->input('body');
echo $this->form->hidden('id');
echo $this->form->end('Update');
?>