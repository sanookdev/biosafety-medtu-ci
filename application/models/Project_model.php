<?
class Project_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_projectAll(){
        $this->db->select('*');
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function getCountProjectStatus($status){
        $this->db->select('COUNT(projectStatus) AS count');
        $this->db->where('projectStatus',$status);
        $query = $this->db->get('projects',1);
        foreach ($query->result_array() as $row) {
            return $row;
        }
    }

    public function getProject($projectId){
        $this->db->select('*');
        $this->db->where('projectId',$projectId);
        $query = $this->db->get('projects',1);
        foreach ($query->result() as $row) {
            return $row;
        }
    }

    public function create($data){
        if($this->db->insert('projects',$data)){
            return 1;
        }else{
            return 0;
        }
    }

    public function update($data){
        $this->db->where('projectId',$data['projectId']);
        if($this->db->update('projects',$data)){
            return 1;
        }else{
            return 0;
        }
    }

    public function delete($projectId){
        $this->db->where('projectId',$projectId);
        if($this->db->delete('projects')){
            return 1;
        }else{
            return 0;
        }
    }
}
?>