<style>
.card-body p {
    color: gray;
}
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="form-row">
                        session =
                        <? print_r($this->session->userdata); ?>
                    </div>
                    <div class="card">
                        <div class="card-header flex">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-start">
                                        <h5>รายละเอียด</h5>
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
                            <?if($status == 1){?>

                            <div class="row">
                                <div class="col-md-9 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                รหัสโครงการ
                                            </h5>
                                            <p class="p-2"><?= $results->projectCode?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                เลขที่หนังสือรับรอง
                                            </h5>
                                            <p class=" p-2"><?= $results->projectCertificateNo?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ชื่อโครงการภาษาไทย
                                            </h5>
                                            <p class="p-2"><?= $results->projectNameTH?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ชื่อโครงการภาษาอังกฤษ
                                            </h5>
                                            <p class=" p-2"><?= $results->projectNameEN?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                หัวหน้าโครงการ
                                            </h5>
                                            <p class="p-2"><?= $results->projectPosition . $results->projectLeader ;?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ภาควิชา / แผนก : คณะ
                                            </h5>
                                            <p class=" p-2">
                                                <?= $results->projectDepartment . " : " . $results->projectFaculty?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                เบอร์โทรศัพท์
                                            </h5>
                                            <p class="p-2"><?= $results->projectMobile?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                อีเมลล์
                                            </h5>
                                            <p class=" p-2"><?= $results->projectEmail?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ชนิดประเภทโครงการ
                                            </h5>
                                            <p class="p-2"><?= $results->projectType?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ระดับความปลอดภัยของห้อง Lab
                                            </h5>
                                            <p class=" p-2"><?= $results->projectSecurityLabLevel?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                ห้องที่ใช้งาน
                                            </h5>
                                            <p class="p-2"><?= $results->projectRoom?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่ยื่นขอ
                                            </h5>
                                            <p class=" p-2"><?= $results->projectRequestDate?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่เสนอผู้บริหาร
                                            </h5>
                                            <p class="p-2"><?= $results->projectPresentCeoDate?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่ส่งเอกสารลงนามเข้ามหาวิทยาลัย
                                            </h5>
                                            <p class=" p-2"><?= $results->projectPassToUniversityDate?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่อนุมัติ
                                            </h5>
                                            <p class="p-2"><?= $results->projectApprovalDate?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่กำหนดรายงานความก้าวหน้า
                                            </h5>
                                            <p class=" p-2"><?= $results->projectProcessDate?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่สิ้นสุดการรับรองโครงการ
                                            </h5>
                                            <p class="p-2"><?= $results->projectCertificateExpireDate?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-0">
                                                วันที่ปิดโครงการ
                                            </h5>
                                            <p class=" p-2"><?= $results->projectDateClose?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="mb-0">
                                                หมายเหตุ
                                            </h5>
                                            <p class="p-2"><?= $results->projectComment?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="col-md-3 ml-sm-auto" style="background-color:#f7fafc !important">
                                    <h4 class="text-primary text-center mt-3" style="font-size: 1.3rem">
                                        สถานะโครงการ
                                    </h4>
                                    <hr>
                                    <ul class="gsi-style-12   gsi-vertical">
                                        <li class="<?= ($results->projectStatus >= 0) ? 'visited' : ''?>"><span
                                                class="desc ">
                                                <i class="fas fa-check"></i>&nbsp;รออนุมัติ</span>
                                        </li>
                                        <li class="<?= ($results->projectStatus > 0) ? 'visited' : ''?>"><span
                                                class="desc ">
                                                <i class="fas fa-check"></i>&nbsp;อนุมัติ</span>
                                        </li>
                                        <li class="<?= ($results->projectStatus > 1) ? 'visited' : ''?>"><span
                                                class="desc ">
                                                <i class="fas fa-check"></i>&nbsp;ปิดโครงการ</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url('report')?>" class="btn btn-sm btn-info float-left">ย้อนกลับ</a>
                            </div>


                            <?}else{?>
                            <p>
                                <?= $message;?>
                            </p>
                            <?}?>
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