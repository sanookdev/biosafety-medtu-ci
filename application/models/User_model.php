<?
class User_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_projectAll(){
        $this->db->select('*');
        $this->db->where('medcode',$this->session->userdata['userName']);
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function getCountProjectStatus($status){
        $this->db->select('COUNT(projectStatus) AS count');
        $this->db->where('projectStatus',$status);
        $query = $this->db->get('projects',1);
        foreach ($query->result_array() as $row) {
            if($status == 0){
                $row['message'] = "รออนุมัติ";
            }else if ($status == 1){
                $row['message'] = "อนุมัติ";
            }else{
                $row['message'] = "ปิดโครงการ";
            }
            return $row;
        }
    }
}
?>