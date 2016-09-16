<?php
/**
* User Controller
*/

// action index
class UsersController extends Controller
{

	public $uses= array('Post','User');
	public $helpers = array('Html', 'Form');

	//show all users
	public function index()
	{	
		$this->set('users',$this->User->find('all'));
	}

	//add new user
	public function add()
	{
		if($this->request->is('post'))
		{
			$this->User->create();
			if($this->User->save($this->request->data))
			{
				$this->Flash->success(__('New user is created successfully'));
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Flash->error(__('Error occuring while creating new user.'));
			}
		}
	}

	//edit user
	public function edit($id=null)
	{	
		//if id not submitted
		if(!$id)
		{
			throw new NotFoundException(__('Invalid User'));
		}

		//search user of this user id
		$user = $this->User->findById($id);

		//thorw error no such user found
		if(!$user)
		{
			throw new NotFoundException(__('Invalid User'));
		}

		if($this->request->is(array('post','put')))
		{
			$this->User->id=$id;
			if($this->User->save($this->request->data))
			{
				$this->Flash->success(__('User information is updated successfully'));
				return $this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Flash->error(__('Unable to update user information'));
			}
		}
		if(!$this->request->data)
		{
			$this->request->data= $user;
		}
	}


	//delete user
	public function delete($id=null)
	{
		if($this->request->is('get'))
		{
			throw new MethodNotAllowedException();
		}

		if($this->User->delete($id))
		{
			$this->Flash->success(__('User with id: '.$id.' is successully deleted'));
		}
		else
		{
			$this->Flash->error(__('Error occured while deleting user with id: '.$id));
		}

		return $this->redirect(array('action'=>'index'));
	}

	public function view($id=null)
	{
		if(!$id)
		{
			throw new NotFoundException(__('User Not Found'));
		}

		$user = $this->User->findById($id);
		if(!$user)
		{
			throw new NotFoundException(__('User Not Found'));
		}
		else
		{
		$this->set('user',$user);
		}
	}
}

?>