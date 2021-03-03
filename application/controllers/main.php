<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/***
	*@function name:Register
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	
	public function userform()
	{
		$this->load->view('userform');
	}
	/***
	*@function name:checking email availability
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function email_availibility()  
      {  
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("mainmodel");  
                if($this->mainmodel->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }  
       

      }
      /***
	*@function name:checking phone availability
	*@author : Mahima s
	*@date : 02/03/2021
	***/
      public function phno_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_phno_available($_POST["phno"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Phone number Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }
         

	public function insert()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("firstname","firstname",'required|max_length[25]');
		$this->form_validation->set_rules("lastname","lastname",'required|max_length[25]');
		$this->form_validation->set_rules("username","username",'required|max_length[10]');
		$this->form_validation->set_rules("phno","phno",'required');
		$this->form_validation->set_rules("dob","dob",'required');
		$this->form_validation->set_rules("address","address",'required');
		$this->form_validation->set_rules("district","district",'required');
		$this->form_validation->set_rules("pin","pin",'required');
		$this->form_validation->set_rules("email","email",'required');
		$this->form_validation->set_rules("password","password",'required');
		if($this->form_validation->run())
		{
			$this->load->model('mainmodel');
			$pass=$this->input->post("password");
			$ep=$this->mainmodel->ecps($pass);
			$a=array("firstname"=>$this->input->post("firstname"),"lastname"=>$this->input->post("lastname"),"username"=>$this->input->post("username"),"phno"=>$this->input->post("phno"),
				"dob"=>$this->input->post("dob"),"address"=>$this->input->post("address"),"district"=>$this->input->post("district"),"pin"=>$this->input->post("pin"));
			$b=array("email"=>$this->input->post("email"),"password"=>$ep,"usertype"=>'2');
		$this->mainmodel->insert($a,$b);
		redirect(base_url().'main/userform');
	    }
	}
	/***
	*@function name:login
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function login()
	{
		$this->load->view('login');
	}
	
	public function logns()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email","email",'required');
		$this->form_validation->set_rules("password","password",'required');
		if($this->form_validation->run())
		{
			$this->load->model('mainmodel');
			$email=$this->input->post("email");
			$pass=$this->input->post("password");
			$rslt=$this->mainmodel->selectpass($email,$pass);
				if ($rslt)
				 {
				 	$id=$this->mainmodel->getuserid($email);

				 	$user=$this->mainmodel->getuser($id);
				 	$this->load->library(array('session'));
				 	$this->session->set_userdata(array
				 		('id'=>(int)$user->id,
				 		'usertype'=>$user->usertype,'status'=>$user->status,'logged_in'=>(bool)true));
				 	if($_SESSION['usertype']=='2' && $_SESSION['status']==
				 		'1' && $_SESSION['logged_in']==true)
				 	{
				 		redirect(base_url().'main/userhome');
				 	}
				 	elseif($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
				 	{
				 		redirect(base_url().'main/adminhomepage');
				 	}
				 	else
				 	{
				 		echo "Waiting for approval";
				 	}
				 }
			     else
			     {
			     	echo "invalid user";
			     }
			 }
			 else
			 {
			 	redirect('main/login','refresh');
			 }
				 
}
/***
	*@function name:Admin Home page
	*@author : Mahima s
	*@date : 02/03/2021
	***/
public function adminhomepage()
	{
		if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
		$this->load->view('adminhomepage');
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
	/***
	*@function name:Registered users view
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function adminview()
	{
		if( $_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->view();
		$this->load->view('adminview',$data);
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
	/***
	*@function name:Approve Registration by admin
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function approvedetails()
	{
		if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->approvedetails($id);
		redirect('main/adminview','refresh');
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
	/***
	*@function name:Reject registation by admin
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function rejectdetails()
	{
		if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->rejectdetails($id);
		redirect('main/adminview','refresh');
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
    /***
	*@function name:Delete user by admin
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function deleteuser()
{
	if($_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)
        {
   
 	$id=$this->uri->segment(3);
	$this->load->model('mainmodel');
	$this->mainmodel->admin_delete($id);
	redirect('main/adminview','refresh');
}
else
        {
            redirect('main/userform','refresh');
        }
        }


	public function userhome()

	{
		if($_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
        {
		$this->load->view('userhome');
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
	/***
	*@function name:user profile update
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function updateprofile()
	{
		if($_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
        {
	$this->load->model('mainmodel');
	$id=$this->session->id;
	$data['user_data']=$this->mainmodel->updateprofile($id);
	$this->load->view('updateprofile',$data);
	}
	else
        {
            redirect('main/userform','refresh');
        }
    }
public function userupdate()
	{
		$a=array("firstname"=>$this->input->post("firstname"),"lastname"=>$this->input->post("lastname"),"username"=>$this->input->post("username"),"phno"=>$this->input->post("phno"),"dob"=>$this->input->post("dob"),"address"=>$this->input->post("address"),"district"=>$this->input->post("district"),"pin"=>$this->input->post("pin"));
			$b=array("email"=>$this->input->post("email"));
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$data['user_data']=$this->mainmodel->singledatas($id);
		$this->mainmodel->singleselects();
		$this->load->view('updateprofile',$data);
		if($this->input->post("update"))
		{
			$id=$this->session->id;
			$this->mainmodel->updatedetail($a,$b,$id);
			redirect('main/userhome','refresh');
			
		}
		


	}
	public function logout()
    {
        $data=new stdClass();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true)
        {
            foreach ($_SESSION as $key => $value) 
            {
               unset($_SESSION[$key]);
            }
            $this->session->set_flashdata('logout_notification','logged_out');
            redirect('main/userform','refresh');
        }
        else{
            redirect('/');
        }
    }
 


}
	