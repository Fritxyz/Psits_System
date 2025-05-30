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
        <div id="layoutSidenav">
           <?php include('partials/header2.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                     <div class="container mt-5">
                        <div class="card p-4">
                            <div class="card-header">
                                <h2>CHANGE PASSWORD</h2>
                            </div>

                            <div>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success" id="successMessage">
                                        <?= esc(session()->getFlashdata('success')) ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($errors = session()->getFlashdata('errors')): ?>
                                    <div class="alert alert-danger" id="errorMessage">
                                        <?= is_array($errors) ? implode('<br>', array_map('esc', $errors)) : esc($errors) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <br>

                            <form action="<?= site_url('admin/psits/change-password/update') ?>" method="post">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="cpassword" name="cpassword" class="form-control" >
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                    
                    
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>