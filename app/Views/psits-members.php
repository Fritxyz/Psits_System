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
                        <h1 class="mt-4">PSITS MEMBERS</h1>
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
                                        PSITS MEMBERS   
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>      
                                        <tr>
                                            <!-- <th>Name</th>
                                          
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Actions</th> -->

                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Age</th>
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Gmail</th>
                                            <?php if(session()->get('user_role') == 'Super Admin'): ?>
                                                <th>User Role</th>
                                            <?php endif; ?>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Name</th>
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Actions</th> -->

                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Age</th>
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Section</th>
                                            <th>Grade level</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Gmail</th>
                                            <?php if(session()->get('user_role') == 'Super Admin'): ?>
                                                <th>User Role</th>
                                            <?php endif; ?>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach ($psits_members as $member): ?>
                                        <tr>
                                            <td><?= $member['member-lastname'] ?></td>
                                            <td><?= $member['member-firstname'] ?></td>
                                            <td><?= $member['member-age'] ?></td>
                                            <td><?= $member['member-id-number'] ?></td>
                                            <td><?= $member['member-gender'] ?></td>
                                            <td><?= $member['member-course'] ?></td>
                                            <td><?= $member['member-section'] ?></td>
                                            <td><?= $member['member-gradelevel'] ?></td>
                                            <td><?= $member['member-contact'] ?></td>
                                            <td><?= $member['member-address'] ?></td>
                                            <td><?= $member['member-gmail'] ?></td>

                                            <?php if(session()->get('user_role') == 'Super Admin'): ?>
                                                <td>
                                                    <?= $member['data-user-role']?>
                                                </td>
                                            <?php endif; ?>
                                            
                                                
                                            <td>
                                                <form action="<?= base_url('/admin/psits/members/delete/' . $member['id']) ?>" method="post" style="display:inline;">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                                <a href="/admin/psits/members/<?=$member['id']?>" class="btn btn-primary btn-sm">Update</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <a href="/admin/psits/members/add" class="btn btn-success mt-3">Add New Member</a>
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
