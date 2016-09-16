<?php
/*
* Posts controller
*/

App::uses('AppController','Controller');

class PostsController extends Controller
{
	public $name="Posts";
	public $uses=array('Post','User','Like');
	public $helpers=array('Html','Form');

	public function index()
	{
		$posts = $this->Post->find('all');
		$this->set('posts',$posts);
	}

	public function add()
	{
		//add function to find if user logged in

		//suppose a user is logged in and is admin
		if($this->request->is('post'))
		{
			$this->Post->create();
			if($this->Post->save($this->request->data))
			{	
				$this->Flash->success(__('New article added successfully'));
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Flash->error(__('Error while creating post.'));
			}
		} 
	}

	public function view($id=null)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid Post'));
		}

		$post = $this->Post->findById($id);
		if(!$post)
		{
			throw new NotFoundException(__('Invalid Post'));
		}
		else
		{
			$this->set('post',$post);
		}
	}

	public function edit($id=null)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid Post'));
		}

		$post = $this->Post->findById($id);
		if(!$post)
		{
			throw new NotFoundException(__('Invalid Post'));
		}

		if($this->request->is(array('post','put'))):
		$this->Post->id= $id;
		if($this->Post->save($this->request->data))
		{
			$this->Flash->success(_('Post Updated. View <a href="'.Router::url(array('action'=>'view', $id)).'">Post</a>'));
			$this->redirect(array('action'=>'index'));
		}
		else
		{
			$this->Flash->error(__('Error in Updating the post. Try again later.'));
		}	
		endif;

		if(!$this->request->data)
		{
			$this->request->data = $post;
		}
		
	}


	public function delete($id=null)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Post Not found'));
		}	
		if($this->Post->delete($id))
		{
			$this->Flash->success(__('Post deleted successfully'));
		}else
		{
			$this->Flash->error(__('Error in deleting post'));
		}

		return $this->redirect(array('action'=>'index'));
	}
}
?>