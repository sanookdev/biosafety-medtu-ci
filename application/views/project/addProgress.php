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
                                        <h5>เพิ่มการส่งรายงานความก้าวหน้า</h5>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end"> <a
                                            href="<?= site_url('show/'.$project->projectId);?>"
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
                            <form action="<?= site_url('project/createProgress');?>" method="post">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="projectId">Project ID</label>
                                        <input type="text" class="form-control form-control-sm" name="projectId"
                                            value="<?= $project->projectId;?>" readonly required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>รหัสโครงการ</label>
                                        <p><?= $project->projectCode ;?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <label>เจ้าของโครงการ</label>
                                        <p><?= $project->projectLeader ;?></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="progressReportDate">วันที่ส่งรายงานความก้าวหน้า</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="progressReportDate" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="comment">หมายเหตุ</label>
                                        <?
                                                $data_textarea = array(
                                                    'name' => 'comment',
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
                                    <a href="<?= site_url('show/'. $project->projectId);?>"
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