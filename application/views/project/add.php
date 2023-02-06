<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="form-row">
                        <? echo "<script>console.log(".json_encode($this->session->userdata).")</script>" ;?>
                    </div>
                    <div class="card">
                        <div class="card-header flex">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-start">
                                        <h5>เพิ่มโปรเจค</h5>
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
                                    echo "<p class = 'alert alert-success'>".($this->session->flashdata('err_message')). "</p>";
                                }
                            }
                            
                        ?>

                            <form action="<?= site_url('project/create');?>" method="post">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="projectCode">รหัสโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectCode"
                                            aria-describedby="projectHelp" required>
                                        <!-- <small id="projectHelp" class="form-text text-muted">We'll never share your
                                            email
                                            with
                                            anyone else.</small> -->
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectCertificateNo">เลขที่หนังสือรับรอง</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="projectCertificateNo" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="medcode">MEDCODE เจ้าของโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="medcode" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="projectNameTH">ชื่อโครงการภาษาไทย</label>
                                        <input type="text" class="form-control form-control-sm" name="projectNameTH"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="projectNameEN">ชื่อโครงการภาษาอังกฤษ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectNameEN"
                                            required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for="projectPosition">คำนำหน้า</label>
                                        <input type="text" class="form-control form-control-sm" name="projectPosition"
                                            required>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="projectLeader">หัวหน้าโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectLeader"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectDepartment">ภาควิชา/แผนก</label>
                                        <input type="text" class="form-control form-control-sm" name="projectDepartment"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectFaculty">คณะ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectFaculty"
                                            required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectMobile">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control form-control-sm" name="projectMobile"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectEmail">อีเมลล์</label>
                                        <input type="text" class="form-control form-control-sm" name="projectEmail"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="projectType">ชนิดประเภทโครงการ</label>
                                        <input type="text" class="form-control form-control-sm" name="projectType"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectSecurityLabLevel">ระดับความปลอดภัยของห้อง Lab</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="projectSecurityLabLevel" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="projectRoom">ห้องที่ใช้งาน</label>
                                        <input type="text" class="form-control form-control-sm" name="projectRoom"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectRequestDate">วันที่ยื่นขอ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectRequestDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectPresentCeoDate">วันที่เสนอผู้บริหาร</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectPresentCeoDate" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label
                                            for="projectPassToUniversityDate">วันที่ส่งเอกสารลงนามเข้ามหาวิทยาลัย</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectPassToUniversityDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectApprovalDate">วันที่อนุมัติ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectApprovalDate" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectProcessDate">วันที่กำหนดรายงานความก้าวหน้า</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectProcessDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectCertificateExpireDate">วันที่สิ้นสุดการรับรองโครงการ</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="projectCertificateExpireDate" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="projectDateClose">วันที่ปิดโครงการ</label>
                                        <input type="date" class="form-control form-control-sm" name="projectDateClose">
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
                                                    'value' =>  ''
                                                    );
                                                    echo form_textarea($data_textarea);
                                            ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= base_url('report');?>"
                                        class="btn btn-sm btn-info float-left">ย้อนกลับ</a>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="บันทึก" class="btn btn-sm btn-success float-right">
                                </div>
                            </form>
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


<script>
$(document).ready(function() {
    $('[name =projectRequestDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectPresentCeoDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectPassToUniversityDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectApprovalDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectProcessDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectCertificateExpireDate]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });
    $('[name =projectDateClose]').datetimepicker({
        format: 'Y-m-d',
        timepicker: false
    });

    // $('input[name = projectDateClose]').on('change', function() {
    //     console.log($(this).val());
    // })
})
</script>