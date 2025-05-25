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
    </head>
    <body class="sb-nav-fixed">
        <?php include('partials/header.php'); ?>
        <div id="layoutSidenav">
            <?php include('partials/header2.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">APPROVAL</h1>
                        <?php if (session()->getFlashdata('success')): ?>
                                            <div class="alert alert-success" id="successMessage">
                                                <?= esc(session()->getFlashdata('success')) ?>
                                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('delete')): ?>
                                            <div class="alert alert-danger" id="successMessage">
                                                <?= esc(session()->getFlashdata('delete')) ?>
                                            </div>
                        <?php endif; ?>


                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                                         MEMBER APPROVAL
                                 
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    
                                    <thead>
                                        
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Age</th>
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Gmail</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Age</th>
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Gmail</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($pending_members as $pendingmember): ?>
                                        <tr>
                                            <td><?= $pendingmember['pending_lastname'] ?></td>
                                            <td><?= $pendingmember['pending_firstname'] ?></td>
                                            <td><?= $pendingmember['pending_middlename'] ?></td>
                                            <td><?= $pendingmember['pending_age'] ?></td>
                                            <td><?= $pendingmember['pending_Idnumber'] ?></td>
                                            <td><?= $pendingmember['pending_gender'] ?></td>
                                            <td><?= $pendingmember['pending_course'] ?></td>
                                            <td><?= $pendingmember['pending_section'] ?></td>
                                            <td><?= $pendingmember['pending_gradelevel'] ?></td>
                                            <td><?= $pendingmember['pending_contact'] ?></td>
                                            <td><?= $pendingmember['pending_address'] ?></td>
                                            <td><?= $pendingmember['pending_gmail'] ?></td>
                                            

                                            <td>
                                                <a href="/#/<?=$pendingmember['id']?>" class="btn btn-danger btn-sm">Reject</a>
                                                <a href="/approve/<?=$pendingmember['id']?>" class="btn btn-primary btn-sm">Approve</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                

                            </div>

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
        
        <script>
            // Use JavaScript to hide the success message after 3 seconds
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 2000); // 2000 milliseconds = 2 seconds
        </script>
    </body>
</html>
