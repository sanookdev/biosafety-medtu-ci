<?
class Project_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_projectByUser(){
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

    public function getDocuments($projectId){
        $this->db->select('projectdocuments.*, documenttype.name');
        $this->db->from('projectdocuments');
        $this->db->join('documenttype' , 'documenttype.id = projectdocuments.documentType');
        $this->db->where('projects_projectId',$projectId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDocumentType(){
        $this->db->select('*');
        $query = $this->db->get('documenttype');
        return $query->result();
    }

    public function create($data){
        $data['medcode'] = strtoupper($data['medcode']);
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