<?php
class mainmodel extends CI_model 
{
	/***
	*@function name:insertion of registration
	*@author : Mahima s
	*@date : 02/03/2021
	***/
public function insert($a,$b)
	{
		$this->db->insert("login",$b);
		$loginid=$this->db->insert_id();
		$a['loginid']=$loginid;
		$this->db->insert("reg",$a);
	}
	/***
	*@function name:password encryption
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function ecps($pass)
	{
		return password_hash($pass, PASSWORD_BCRYPT);
	}
	/***
	*@function name:selecting password
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function selectpass($email,$pass)
	{
		$this->db->select('password');
		$this->db->from("login");
		$this->db->where("email",$email);
		$qry=$this->db->get()->row('password');
		return $this->verifypass($pass,$qry);
	}
	/***
	*@function name:verifying password
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function verifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}
	/***
	*@function name:fetching id
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function getuserid($email)
	{
		$this->db->select('id');
		$this->db->from("login");
		$this->db->where("email",$email);
		return $this->db->get()->row('id');
	}
	/***
	*@function name:fetching id
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function getuser($id)
	{
		$this->db->select('*');
		$this->db->from("login");
		$this->db->where("id",$id);
		return $this->db->get()->row();
	}
	/***
	*@function name:Registration view
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function view()
	{
		$this->db->select('*');
		$this->db->join('login','login.id=reg.loginid','inner');
		$qry=$this->db->get("reg");
		return $qry;
	}
	
	public function singleselect()
	{
		$qry=$this->db->get("reg");
		return $qry;
	}
	/***
	*@function name:approval by admin
	*@author : Mahima s
	*@date : 02/03/2021
	***/

	public function approvedetails($id)
	{
		$this->db->set('status','1');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("login");
		return $qry;
	}
	/***
	*@function name:Rejection by admin
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function rejectdetails($id)
	{
		$this->db->set('status','2');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("login");
		return $qry;
	}
	/***
	*@function name:deletion
	*@author : Mahima s
	*@date : 02/03/2021
	***/
	public function admin_delete($id)
   {
    $this->db->where("loginid",$id);
    $this->db->delete("reg");
    $qry=$this->db->join("login",'login.id=reg.loginid','inner');
    $this->db->where("id",$id);
    $this->db->delete("login");


  }
  /***
	*@function name:profile updation
	*@author : Mahima s
	*@date : 02/03/2021
	***/
  public function updateprofile($id)
{
	$this->db->select('*');
	$qry=$this->db->join("login",'login.id=reg.loginid','inner');
	$qry=$this->db->where("reg.loginid",$id);
	$qry=$this->db->get("reg");
	return $qry;
}
  public function updatedetail($a,$b,$id)
	{
		$this->db->select('*');
		$qry=$this->db->where("loginid",$id);
		$qry=$this->db->join("login",'login.id=reg.loginid','inner');
		$qry=$this->db->update("reg",$a);
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("login",$b);
		return $qry;
	}
	
	function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("login");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      public function is_phno_available($phno)  
      {  
           $this->db->where('phno', $phno);  
           $query = $this->db->get("reg");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      
 
	
}


