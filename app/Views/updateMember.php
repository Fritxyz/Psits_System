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
                        <h1 class="mt-4">UPDATE MEMBER</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    PSITS UPDATE MEMBER
                                </div>
                                <div class="card-body">
                            
                                    <form action="<?= base_url('/updating') ?>" method="post" >
                                        
                                        <div class="modal-body">
                                            <input type="text" name="id" value="<?= $psits_members['id'] ?>" hidden>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="memberName" name="member-lastname" value="<?= $psits_members['member-lastname'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="memberName" name="member-firstname" value="<?= $psits_members['member-firstname'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="memberName" name="member-middlename" value="<?= $psits_members['member-middlename'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Age</label>
                                                <input type="text" class="form-control" id="memberName" name="member-age" value="<?= $psits_members['member-age'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Id Number</label>
                                                <input type="text" class="form-control" id="memberName" name="member-id-number" value="<?= $psits_members['member-id-number'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberGender" class="form-label">Gender</label>
                                                <input type="text" class="form-control" id="memberGender" name="member-gender" value="<?=$psits_members['member-gender']?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberCourse" class="form-label">Course</label>
                                                <input type="text" class="form-control" id="memberCourse" name="member-course" value="<?= $psits_members['member-course']?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberSection" class="form-label">Section</label>
                                                <input type="text" class="form-control" id="memberSection" name="member-section" value="<?= $psits_members['member-section']?>"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberGradeLevel" class="form-label">Grade Level</label>
                                                <input type="text" class="form-control" id="memberGradeLevel" name="member-gradelevel" value="<?= $psits_members['member-gradelevel']?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberContact" class="form-label">Contact</label>
                                                <input type="text" class="form-control" id="memberContact" name="member-contact" value="<?= $psits_members['member-contact']?>"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberAddress" class="form-label">Address</label>
                                                <textarea class="form-control" id="memberAddress" name="member-address" rows="3" required><?= $psits_members['member-address'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Gmail</label>
                                                <input type="text" class="form-control" id="memberName" name="member-gmail" value="<?= $psits_members['member-gmail'] ?>" required>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" name="updating" class="btn" style="background-color: #198754; color: white;">Update</button>
                                        </div>
                                    </form>
                                </div>
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
    </body>
</html>
