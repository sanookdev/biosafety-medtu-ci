<?
class Member_model extends CI_Model{
    public function fetch_user_login($username,$password){
        $this->db->select('userId,userName,userRole');
        $this->db->where('userName',$username);
        $this->db->where('userPassword',$password);
        $query = $this->db->get('users',1);
        return $query->row();
    }
}
?>