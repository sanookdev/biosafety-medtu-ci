<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-2">
                <? echo "<script>console.log(".json_encode($this->session->userdata).")</script>" ;?>
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
                        <div class='form-row'>
                            <?
                            foreach ($documentType as $value) {
                                // print_r($value);
                                ?>
                            <div class="col-md-12">
                                <p>
                                    <? 
                                            echo $value->id.".".$value->name;
                                            foreach ($documents as $doc) {
                                                if($doc->documentType == $value->id){
                                                    echo nbs(2)."<a href = '".base_url('uploads/'.$projectId.'/'.$doc->documentNameFile)."'>" .$doc->documentNameFile . "</a>";
                                                }
                                            }
                                        ?>
                                </p>
                            </div>
                            <?}?>
                        </div>
                        <?}else{?>
                        <p class="alert alert-danger">File Not Found.</p>
                        <?}?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>