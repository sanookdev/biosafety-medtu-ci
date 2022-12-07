<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>โปรเจ็คทั้งหมด</h4>
                            </div>
                            <button class="btn btn-sm btn-success float-right">
                                <i class="nav-icon fas fa-plus"></i> เพิ่มโปรเจค
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>รหัสโครงการ</th>
                                        <th>สถานะ</th>
                                        <th>ชื่อโครงการ</th>
                                        <th>ชื่อโครงการ (ENG)</th>
                                        <th>หัวหน้าโครงการ</th>
                                        <th>วันที่ยื่นขอ</th>
                                        <th>วันที่อนุมัติ</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? foreach ($result as $rs) {?>
                                    <tr>
                                        <td><?= $rs->projectCode;?></td>
                                        <?
                                        if($rs->projectStatus == '0'){
                                            echo "<td class = 'text-info'>รออนุมัติ</td>";
                                        }else if($rs->projectStatus == '1'){
                                            echo "<td class = 'text-success'>อนุมัติ</td>";
                                        }else{
                                            echo "<td class = 'text-danger'>ปิดโครงการ</td>";
                                        }              
                                        ?>
                                        <td><?= $rs->projectNameTH;?></td>
                                        <td><?= $rs->projectNameEN?></td>
                                        <td><?= $rs->projectLeader;?></td>
                                        <td><?= $rs->projectRequestDate;?></td>
                                        <td><?= $rs->projectApprovalDate;?></td>
                                        <td>
                                            <div class="form-row">
                                                <a class="btn btn-sm btn-outline-info"
                                                    href="<?php echo base_url('report/edit/'.$rs->projectId);?>">edit</a>
                                                <!-- <button class="btn btn-sm btn-outline-info"
                                                    onclick="<?= base_url('report/edit');?>report/edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary"><i
                                                        class="fas fa-folder"></i></button> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>
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