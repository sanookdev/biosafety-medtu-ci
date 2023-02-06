<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <? echo "<script>console.log(".json_encode($this->session->userdata).")</script>" ;?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>โปรเจ็คทั้งหมด</h4>
                            </div>
                            <a href="<?= site_url('project/add')?>" class="btn btn-sm btn-success float-right">
                                <i class="nav-icon fas fa-plus"></i> เพิ่มโปรเจค
                            </a>
                        </div>
                        <div class="card-body">
                            <?
                            if(!empty($this->session->flashdata('err_status'))){
                                if($this->session->flashdata('err_status') == '1'){
                                    echo "<p class = 'alert alert-success'>".($this->session->flashdata('err_message')). "</p>";
                                }
                            }
                            
                        ?>
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
                                                <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-primary"
                                                        href="<?= site_url('show/'.$rs->projectId);?>"><i
                                                            class="nav-icon fas fa-eye"></i></a>
                                                </div>
                                                <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-secondary"
                                                        href="<?= site_url('documents/'.$rs->projectId);?>"><i
                                                            class="nav-icon fas fa-folder-open"></i></a>
                                                </div>
                                                <!-- <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-info"
                                                        href="<?= site_url('edit/'.$rs->projectId);?>"><i
                                                            class="nav-icon fas fa-edit"></i></a>
                                                </div> -->
                                                <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-danger" href="javascript:void(0);"
                                                        onclick="deleteProject(<?= $rs->projectId ; ?>)"><i
                                                            class="nav-icon fas fa-trash"></i></a>
                                                </div>

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


<script>
var rootUrl = location.hostname;
$(document).ready(function() {
    var option = <?= (isset($_REQUEST['option'])) ? json_encode($_REQUEST['option']) : "''";?>;
    $('.table').DataTable({
        language: {
            searchPlaceholder: "Search records"
        },
        "pageLength": 3,
        initComplete: function() {
            this.api()
                .columns()
                .every(function() {
                    var column = this;
                    console.log(column)
                    if (column[0] == 1) {
                        let text = $(column.header())[0]
                            .innerHTML;
                        var select =
                            $(
                                '<select class = "form-control form-control-sm col-md-3 float-right ml-2"><option value="" >' +
                                text + '</option></select>'
                            )
                            .appendTo($(
                                '#DataTables_Table_0_filter'))
                            .on('change', function() {
                                var val = $.fn.dataTable
                                    .util.escapeRegex($(
                                        this).val());
                                console.log(val)
                                column.search(val ?
                                        '^' +
                                        val + '$' : '',
                                        true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                        select.append('<option ' + (('รออนุมัติ' == option) ? 'selected' : '') +
                            ' value="รออนุมัติ">รออนุมัติ</option>');
                        select.append('<option ' + (('อนุมัติ' == option) ? 'selected' : '') +
                            ' value="อนุมัติ">อนุมัติ</option>');
                        select.append('<option ' + (('ปิดโครงการ' == option) ? 'selected' :
                                '') +
                            ' value="ปิดโครงการ">ปิดโครงการ</option>');

                        column.search(option ?
                                '^' +
                                option + '$' : '',
                                true, false)
                            .draw();
                    }

                });
        },
    });

    var pId = '';
    var table = '';


    deleteProject = (projectId) => {
        let url = "<?= site_url('project/delete/')?>";
        alertify.confirm("Do you want to delete this?",
            function() {
                window.location = url + projectId;
            },
            function() {
                alertify.error('Cancel');
            }).set({
            title: '!! Are you sure ?'
        });
    }

    // upload the document of project by name type
    uploadDocument = async (element) => {
        let data = new FormData();
        let file = element[0].files;
        let nameId = element[0].id;
        let typeId = '';
        switch (nameId) {
            case 'document-a':
                typeId = 1;
                break;
            case 'document-b-a':
                typeId = 2;
                break;
            case 'document-b-b':
                typeId = 3;
                break;
            case 'document-c':
                typeId = 4;
                break;
            case 'document-d':
                typeId = 5;
                break;
            case 'document-e':
                typeId = 6;
                break;
            case 'document-f':
                typeId = 7;
                break;
            case 'document-g':
                typeId = 8;
                break;
            case 'document-h':
                typeId = 9;
                break;
        }
        if (file.length > 0) {
            data.append('file', file[0]);
            data.append('projectId', pId);
            data.append('rename', nameId);
            data.append('docType', typeId);
            console.log(data);
            $.ajax({
                url: './api/file_upload_parser.php',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: (res) => {
                    console.log(res);
                },
            });
        }
    }
});
</script>