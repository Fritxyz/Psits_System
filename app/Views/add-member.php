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
                        <h1 class="mt-4">ADD MEMBER</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        <div class="card mb-4">
                        <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            PSITS ADD MEMBER
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            
                            <form action="<?= base_url('/admin/psits/members/adding-member') ?>" method="post" >
                                    
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="memberName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="memberName" name="member-lastname" placeholder="example :  Lauban" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="memberName" name="member-firstname" placeholder="example : Hoper  " required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberName" class="form-label">Age</label>
                                            <input type="text" class="form-control" id="memberName" name="member-age" placeholder="23" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberName" class="form-label">Id Number</label>
                                            <input type="text" class="form-control" id="memberName" name="member-id-number" placeholder="example : 2250023" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberGender" class="form-label">Gender</label>
                                            <select class="form-control" id="member-gender" name="member-gender" required>
                                                <option value="" disabled selected>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberCourse" class="form-label">Course</label>
                                            <select class="form-control" id="member-course" name="member-course" required>
                                                <option value="" disabled selected>Select Course (Example: BS-COMSCI)</option>
                                                <option value="BS-COMSCI">BS-COMSCI</option>
                                                <option value="BS-INFOSYS">BS-INFOSYS</option>
                                                <option value="BS-INFOTECH">BS-INFOTECH</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberSection" class="form-label">Section</label>
                                            <select class="form-control" id="member-section" name="member-section" required>
                                                <option value="" disabled selected>Select course</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberGradeLevel" class="form-label">Grade Level</label>
                                            <select class="form-control" id="member-gradelevel" name="member-gradelevel" required>
                                                <option value="" disabled selected>Select grade level</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">Irregular</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="memberContact" class="form-label">Contact</label>
                                            <input type="text" class="form-control" id="memberContact" name="member-contact"placeholder="example : 09133722923"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="memberAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="memberAddress" name="member-address" rows="3"  required></textarea>
                                        </div>
                                         <div class="mb-3">
                                            <label for="memberContact" class="form-label">Gmail</label>
                                            <input type="text" class="form-control" id="memberContact" name="member-gmail"placeholder="example : example@gmail.com"  required>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" name="adding" class="btn" style="background-color: #198754; color: white;">Add</button>
                                    </div>
                                </form>
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
