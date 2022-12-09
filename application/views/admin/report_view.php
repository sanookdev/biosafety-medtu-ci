<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <? print_r($this->session->userdata);?>
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
                                                <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-info"
                                                        href="<?= site_url('edit/'.$rs->projectId);?>"><i
                                                            class="nav-icon fas fa-eye"></i></a>
                                                </div>
                                                <div class="col-md p-0 mt-1">
                                                    <a class="btn btn-sm btn-outline-secondary"
                                                        href="<?= site_url('files/'.$rs->projectId);?>"><i
                                                            class="nav-icon fas fa-folder-open"></i></a>
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


<script type="text/javascript">
var rootUrl = location.hostname;
$(document).ready(function() {
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
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' +
                                    d + '">' + d +
                                    '</option>');
                            });
                    }

                });
        },
    });

    var pId = '';
    var table = '';


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

    // show modal edit form of project
    projectEdits = async (projectId) => {
        pId = projectId;
        let details = {};
        await axios.post('./api/informations.php', {
            action: 'projectEdits',
            projectId: projectId
        }).then((res) => {
            details = res.data.data[0]
            if (details == '') {
                console.log('data empty')
            } else {
                $.each(details, function(keys, values) {
                    $('#' + keys).val(values);
                });
            }
        })
        $('#projectEdits').modal('show');
    }


    // update data of project 
    projectUpdate = async () => {
        let datas = {};
        $.each($("#projectEditForm").serializeArray(), function(i, field) {
            datas[field.name] = field.value;
        });
        await axios.post('./api/informations.php', {
            action: 'updateProjects',
            data: datas,
            projectId: pId
        }).then(async (res) => {
            if (res.data.status) {
                await alertify.success('Updated')
                await reportAll();
                await $('#projectEdits').modal('hide');
            }
        })
    }

    // clear link file a tag every reclick for show list documents of project
    clearDataFile = async () => {
        console.log('clear data ready now !');
        $('#formDocuments a').each(function(index) {
            var forAttr = $(this);
            forAttr[0].remove()
        });
    }

    // show list documents of project
    projectDocuments = async (projectId) => {
        pId = projectId;
        console.log('project documents ready. id = ' + projectId);
        await clearDataFile();
        await axios.post('./api/informations.php', {
            action: 'projectDocuments',
            projectId: projectId
        }).then((res) => {
            console.log('project document list ready now !');
            if (res.data.message == 'success') {
                let details = res.data.data;
                console.log(res)
                details.forEach(element => {
                    let name = element.documentNameFile.split('.');
                    let file = element.documentNameFile;
                    let targetUrl = "../uploads/projects/" + pId + "/" + file;
                    let el = $('label[for=' + name[0] + ']')[0].textContent.trim();
                    let linkFileopen = ' <a href = "' + targetUrl +
                        '" target = "_blank">' + file +
                        '</a>';
                    $('label[for="' + name[0] + '"]').after(linkFileopen);
                });
            }
        })
        $('#projectDocuments').modal('show');
    }
});
</script>