<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page for Admin</title>
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 class="noProjectAll"></h3>

                                <p>โครงการทั้งหมด</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#report/reportAll" class="small-box-footer" onclick="report_menu(1)">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 class="noProjectAwait"></h3>
                                <p>โครงการใหม่รออนุมัติ</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-table"></i>
                            </div>
                            <a href="#report/reportAwaitingApprove" onclick="report_menu(2)"
                                class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 class="noProjectExpire"></h3>
                                <p>โครงการใกล้หมดอายุ</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <a href="#report/reportExpire" onclick="report_menu(3)" class="small-box-footer">More info
                                <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
    $(document).ready(() => {
        listProjectAll = async () => {
            await axios.post('./api/informations.php', {
                action: 'countListProject',
                title: 'listProjectAll'
            }).then((res) => {
                if (res.data.count > 0) {
                    let count = res.data.count;
                    $('.noProjectAll').html(count);
                }
            })
        }
        listProjectAwaitingApproval = async () => {
            await axios.post('./api/informations.php', {
                action: 'countListProject',
                title: 'listProjectAwaitingApproval'
            }).then((res) => {
                if (res.data.count > 0) {
                    let count = res.data.count;
                    $('.noProjectAwait').html(count);
                }
            })
        }
        listProjectExpire = async () => {
            await axios.post('./api/informations.php', {
                action: 'countListProject',
                title: 'listProjectExpire'
            }).then((res) => {
                console.log(res);
                if (res.data.count > 0) {
                    let count = res.data.count;
                    $('.noProjectExpire').html(count);
                }
            })
        }
        initailLoadCount = async () => {
            await listProjectAll();
            await listProjectAwaitingApproval();
            await listProjectExpire();
        }

        // initailLoadCount();

    })
    </script>
</body>

</html>