<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="form-row">
                        <? echo "<script>console.log(".json_encode($this->session->userdata).")</script>" ;?>
                    </div>
                    <div class="card">
                        <div class="card-header flex">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-start">
                                        <h5>แก้ไขข้อมูล</h5>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end"> <a href="<?= site_url('report')?>"
                                            class="justify-content-center">back
                                            <i class="fas fa-arrow-right"></i>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-5">
                            <?
                            if(!empty($this->session->flashdata('err_status'))){
                                if($this->session->flashdata('err_status') == '1'){
                                    echo "<script>alertify.success('".$this->session->flashdata('err_message')."')</script>";
                                    // echo "<p class = 'alert alert-success'>".($this->session->flashdata('err_message')). "</p>";
                                }
                            }
                            
                        ?>

                            <?if($status == 1){?>

                            <form action="<?= site_url('project/update');?>" method="post">
                                <div class="form-row">
                                    <input type="text" name="projectId" value="<?= $results->projectId?>" hidden>
                                    <div class="col-md-4">
                                        <label for="projectCode">รหัสโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectCode"
                                            value="<?= $results->projectCode;?>" aria-describedby="projectHelp" readonly
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectCertificateNo">เลขที่หนังสือรับรอง</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="projectCertificateNo" value="<?= $results->projectCertificateNo;?>"
                                            readonly required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectStatus">สถานะโครงการ</label>
                                        <select name="projectStatus" class="form-control form-control-sm"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'disabled' : '' ;?>>
                                            <option value="0" <?= ($results->projectStatus == 0) ? "selected" : "" ?>>
                                                รออนุมัติ</option>
                                            <option value="1" <?= ($results->projectStatus == 1) ? "selected" : "" ?>>
                                                อนุมัติ</option>
                                            <option value="2" <?= ($results->projectStatus == 2) ? "selected" : "" ?>>
                                                ปิดโครงการ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="projectNameTH">ชื่อโครงการภาษาไทย</label>
                                        <input type="text" class="form-control form-control-sm" name="projectNameTH"
                                            value="<?= $results->projectNameTH;?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="projectNameEN">ชื่อโครงการภาษาอังกฤษ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectNameEN"
                                            value="<?= $results->projectNameEN;?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for="projectPosition">คำนำหน้า</label>
                                        <input type="text" class="form-control form-control-sm" name="projectPosition"
                                            value="<?= $results->projectPosition ;?>" required>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="projectLeader">หัวหน้าโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectLeader"
                                            value="<?= $results->projectLeader;?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectDepartment">ภาควิชา/แผนก</label>
                                        <input type="text" class="form-control form-control-sm" name="projectDepartment"
                                            value="<?= $results->projectDepartment;?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectFaculty">คณะ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectFaculty"
                                            value="<?= $results->projectFaculty;?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectMobile">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control form-control-sm" name="projectMobile"
                                            value="<?= $results->projectMobile;?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectEmail">อีเมลล์</label>
                                        <input type="text" class="form-control form-control-sm" name="projectEmail"
                                            value="<?= $results->projectEmail;?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="projectType">ชนิดประเภทโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectType"
                                            value="<?= $results->projectType;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectSecurityLabLevel">ระดับความปลอดภัยของห้อง Lab</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="projectSecurityLabLevel"
                                            value="<?= $results->projectSecurityLabLevel;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectRoom">ห้องที่ใช้งาน</label>
                                        <input type="text" class="form-control form-control-sm" name="projectRoom"
                                            value="<?= $results->projectRoom;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectRequestDate">วันที่ยื่นขอ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectRequestDate" value="<?= $results->projectRequestDate;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectPresentCeoDate">วันที่เสนอผู้บริหาร</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectPresentCeoDate" value="<?= $results->projectPresentCeoDate;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label
                                            for="projectPassToUniversityDate">วันที่ส่งเอกสารลงนามเข้ามหาวิทยาลัย</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectPassToUniversityDate"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            value="<?= $results->projectPassToUniversityDate;?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectApprovalDate">วันที่อนุมัติ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectApprovalDate" value="<?= $results->projectApprovalDate;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectProcessDate">วันที่กำหนดรายงานความก้าวหน้า</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectProcessDate" value="<?= $results->projectProcessDate;?>"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectCertificateExpireDate">วันที่สิ้นสุดการรับรองโครงการ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectCertificateExpireDate"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            value="<?= $results->projectCertificateExpireDate;?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectDateClose">วันที่ปิดโครงการ</label>
                                        <input type="date" class="form-control form-control-sm" name="projectDateClose"
                                            <?= ($this->session->userdata['userRole'] != '1') ? 'readonly' : '' ;?>
                                            value="<?= $results->projectDateClose;?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="projectComment">หมายเหตุ</label>
                                        <?
                                                $data_textarea = array(
                                                    'name' => 'projectComment',
                                                    'rows' => 5,
                                                    'style' => 'width:100%',
                                                    'class' => 'form-control form-control-sm',
                                                    'value' => $results->projectComment
                                                    );

                                                    if($this->session->userdata['userRole'] != '1'){
                                                        $data_textarea['readonly'] = 'readonly';
                                                    }
                                                    echo form_textarea($data_textarea);
                                            ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">

                                        <input type="submit" value="อัพเดต" class="btn btn-sm btn-success float-right">
                                    </div>
                                </div>
                            </form>


                            <?}else{?>
                            <p class="alert alert-danger">
                                <?= $message;?>
                            </p>
                            <?}?>
                            <hr>

                            <?
                       
                                $i = 0 ;
                                foreach ($documentType as $value) {
                                    if($i % 2 == 0){
                                        echo "<div class = 'form-row'>";
                                    }
                                    ?>
                            <div class="col-md-6">
                                <form
                                    action="<?php echo site_url('upload/save_file/'.$results->projectId.'/'.$value->id . '/' . $value->keyid); ?>"
                                    method="post" enctype="multipart/form-data">
                                    <label for="file">
                                        <? 
                                                        echo $value->name;
                                                        foreach ($documents as $doc) {
                                                            if($doc->documentType == $value->id){
                                                                echo nbs(2)."<a href = '".base_url('uploads/'.$results->projectId.'/'.$doc->documentNameFile)."'>download file</a>";
                                                            }
                                                        }
                                                    ?>
                                    </label>
                                    <br>
                                    <input type="file" name="<?= $value->keyid;?>" id="<?= $value->keyid;?>"><br>
                                    <input type="submit" value="Upload">
                                </form>
                            </div>
                            <?
                                    if($i % 2+1 == 0){
                                        echo "</div>";
                                        }
                                        $i++;
                                }
                            ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row import projects-->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>