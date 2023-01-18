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

    // select ข้อมูลการขยายเวลารับรองโครงการที่ผู้วิจัยขอ
    public function getExtended($projectId){
        $this->db->select('*');
        $this->db->where('projectId',$projectId);
        $this->db->order_by('created','ASC');
        $query = $this->db->get('certextendeddate');
        return $query->result() ;
    }

    // select ข้อมูลการส่งรายงานความก้าวหน้าผู้วิจัย
    public function getProgress($projectId){
        $this->db->select('*');
        $this->db->where('projectId',$projectId);
        $this->db->order_by('created','ASC');
        $query = $this->db->get('progressreport');
        return $query->result() ;
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

    public function createExtend($data){
        if($this->db->insert('certextendeddate',$data)){
            return 1;
        }else{
            return 0;
        }
    }
    public function createProgress($data){
        if($this->db->insert('progressreport',$data)){
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