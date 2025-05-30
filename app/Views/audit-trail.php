<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PSITS</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <?php include('partials/header.php'); ?>

        <!-- Main layout -->

    <div id="layoutSidenav">
                 <?php include('partials/header2.php'); ?>

        <!-- Main content section -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <div class="row">
                        
                      
                        

                        <!-- Right Side: Pending Announcements -->
                        <div class="col-md-12">
                            
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
                                    <?= session()->getFlashdata('success') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="flash-message">
                                    <?= session()->getFlashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>


                            <div class="card">
                                <div class="card-header">
                                    <h4>Audit Trail</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Table of pending announcements -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Action</th>
                                                <th>Details</th>
                                                <th>IP</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($audits as $audit): ?>
                                                <tr>
                                                    <td>
                                                        <?= esc($audit['username'] ?? 'User #' . $audit['user_id']) ?>
                                                    </td>
                                                    <td><?= esc($audit['action']) ?></td>
                                                    <td><?= esc($audit['details']) ?></td>
                                                    <td><?= esc($audit['ip_address']) ?></td>
                                                    <td><?= esc($audit['created_at']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('partials/footer.php'); ?>

        </div>
    </div>

     <!-- External CDNs -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

        <!-- Local scripts -->
        <script src="<?= base_url('js/scripts.js') ?>"></script>
        <script src="<?= base_url('assets/demo/chart-area-demo.js') ?>"></script>
        <script src="<?= base_url('assets/demo/chart-bar-demo.js') ?>"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js') ?>"></script>



<script>
    // Wait for DOM to load
    document.addEventListener('DOMContentLoaded', function () {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                // Bootstrap 5 alert close
                const alert = new bootstrap.Alert(flashMessage);
                alert.close();
            }, 1000); // 1000ms = 1 second
        }
    });
</script>



</body>

</html>