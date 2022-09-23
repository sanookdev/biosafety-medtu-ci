<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>นำเข้าข้อมูล</h4>
                            </div>
                            <button class="btn btn-sm btn-success float-right">
                                <i class="nav-icon fas fa-plus"></i> เพิ่มโปรเจค
                            </button>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="projects-tab" data-toggle="tab" href="#projects"
                                        role="tab" aria-controls="projects" aria-selected="true">นำเข้าไฟล์ข้อมูล
                                        Projects</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="participants-tab" data-toggle="tab" href="#participants"
                                        role="tab" aria-controls="participants"
                                        aria-selected="false">นำเข้าไฟล์ข้อมูลผู้ร่วมวิจัย</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="projects" role="tabpanel"
                                    aria-labelledby="projects-tab">
                                    <form id="projects-upload" autocomplete="off">
                                        <div class="form-row mt-3">
                                            <div class="col-md-12 input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="file"
                                                        onchange="changeNameFileinput($(this))">
                                                    <label class="custom-file-label" for="file">Choose
                                                        projects file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button
                                                        class="btn btn-secondary btn-sm waves-effect waves-light">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="participants" role="tabpanel"
                                    aria-labelledby="participants-tab">
                                    <form id="participants-upload" autocomplete="off">
                                        <div class="form-row mt-3">
                                            <div class="col-md-12 input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file2" name="file2"
                                                        onchange="changeNameFileinput($(this))">
                                                    <label class="custom-file-label" for="file2">Choose
                                                        participants file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button
                                                        class="btn btn-secondary btn-sm waves-effect waves-light">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
$(document).ready(function() {
    changeNameFileinput = (e) => {
        let id = e[0].id;
        var filename = e.val().replace(/C:\\fakepath\\/i, '')
        $('label[for=' + id + ']').text(filename);
    }
    $("body").on("submit", "#projects-upload", function(e) {
        e.preventDefault();
        let data = new FormData(this);
        console.log(data);
        $.ajax({
            type: 'POST',
            url: "<?= base_url('excel/import') ?>",
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#btnUpload").prop('disabled', true);
                $(".user-loader").show();
            },
            success: function(result) {
                console.log(result);
                $("#btnUpload").prop('disabled', false);
                if ($.isEmptyObject(result.error_message)) {
                    alertify.success(result.success_message);
                } else {
                    alertify.error(result.error_message);
                }
                $(".user-loader").hide();
            }
        });
    });

    $("body").on("submit", "#participants-upload", function(e) {
        e.preventDefault();
        let data = new FormData(this);
        console.log(data);
        // $.ajax({
        //     type: 'POST',
        //     url: "<?= base_url('excel/import') ?>",
        //     data: data,
        //     dataType: 'json',
        //     contentType: false,
        //     cache: false,
        //     processData: false,
        //     beforeSend: function() {
        //         $("#btnUpload").prop('disabled', true);
        //         $(".user-loader").show();
        //     },
        //     success: function(result) {
        //         console.log(result);
        //         $("#btnUpload").prop('disabled', false);
        //         if ($.isEmptyObject(result.error_message)) {
        //             $(".result").html(result.success_message);
        //         } else {
        //             $(".sub-result").html(result.error_message);
        //         }
        //         $(".user-loader").hide();
        //     }
        // });
    });
});
</script>