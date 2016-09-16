<?php
/**
* User Model
*/

// action index
class User extends AppModel{

public $hasMany=array(
				'Post'=>array('className'=>'Post',
							'foreignKey' => 'user_id'));

}

?>