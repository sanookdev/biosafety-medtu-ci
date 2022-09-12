<?
class User_model extends CI_Model{
    public function fetch_user_login($username,$password){
        
        $this->db->where('userName',$username);
        $this->db->where('userPassword',$password);
        $query = $this->db->get('users');
        return $query->row();
    }
}
?>