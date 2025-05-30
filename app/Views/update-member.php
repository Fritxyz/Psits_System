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

                        <div>
                            <?php if (session('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                       
                        <div class="card mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    PSITS UPDATE MEMBER
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('/admin/psits/members/' . $psits_members['id'] . '/update') ?>" method="post" >
                                        
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
                                                <label for="memberName" class="form-label">Age</label>
                                                <input type="text" class="form-control" id="memberName" name="member-age" value="<?= $psits_members['member-age'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="memberName" class="form-label">Id Number</label>
                                                <input type="text" class="form-control" id="memberName" name="member-id-number" value="<?= $psits_members['member-id-number'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <?php $selectedGender = $psits_members['member-gender'] ?>

                                                <label for="memberGender" class="form-label">Gender</label>
                                                <select class="form-control" id="member-gender" name="member-gender" required>
                                                    <option value="" disabled <?= $selectedGender == '' ? 'selected' : '' ?>>-- Select Gender --</option>
                                                    <option value="Male" <?= $selectedGender == 'Male' ? 'selected' : '' ?>>Male</option>
                                                    <option value="Female" <?= $selectedGender == 'Female' ? 'selected' : '' ?>>Female</option>
                                                    <option value="Other" <?= $selectedGender == 'Other' ? 'selected' : '' ?>>Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <?php $selectedCourse = $psits_members['member-course'] ?>

                                                <label for="memberCourse" class="form-label">Course</label>
                                                <select class="form-control" id="member-course" name="member-course" required>
                                                    <option value="" disabled <?= $selectedCourse == '' ? 'selected' : 'Select course' ?>>-- Select Course --</option>
                                                    <option value="BS-COMSCI" <?= $selectedCourse == 'BS-COMSCI' ? 'selected' : '' ?>>BS-COMSCI</option>
                                                    <option value="BS-INFOSYS" <?= $selectedCourse == 'BS-INFOSYS' ? 'selected' : '' ?>>BS-INFOSYS</option>
                                                    <option value="BS-INFOTECH" <?= $selectedCourse == 'BS-INFOTECH' ? 'selected' : '' ?>>BS-INFOTECH</option>
                                                </select>
                                            </div>

                                            <!-- todo:  clean the addmember and updatemember-->

                                            <div class="mb-3">
                                                <?php $selectedSection = $psits_members['member-section'] ?>        

                                                <label for="memberSection" class="form-label">Section</label>
                                                <select class="form-control" id="member-section" name="member-section" required>
                                                    <option value="" disabled <?= $selectedSection == '' ? 'selected' : '' ?>>-- Select Section --</option>
                                                    <option value="A" <?= $selectedSection == 'A' ? 'selected' : '' ?>>A</option>
                                                    <option value="B" <?= $selectedSection == 'B' ? 'selected' : '' ?>>B</option>
                                                    <option value="C" <?= $selectedSection == 'C' ? 'selected' : '' ?>>C</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <?php $selectedGradeLevel = $psits_members['member-gradelevel'] ?>

                                                <label for="memberGradeLevel" class="form-label">Grade Level</label>
                                                <select class="form-control" id="member-gradelevel" name="member-gradelevel" required>
                                                    <option value="" disabled <?= $selectedGradeLevel == '' ? 'selected' : '' ?>>-- Select Grade Level --</option>
                                                    <option value="1" <?= $selectedGradeLevel == '1' ? 'selected' : '' ?>>1</option>
                                                    <option value="2" <?= $selectedGradeLevel == '2' ? 'selected' : '' ?>>2</option>
                                                    <option value="3" <?= $selectedGradeLevel == '3' ? 'selected' : '' ?>>3</option>
                                                    <option value="4" <?= $selectedGradeLevel == '4' ? 'selected' : '' ?>>4</option>
                                                    <option value="5" <?= $selectedGradeLevel == '5' ? 'selected' : '' ?>>Irregular</option>
                                                </select>
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

                                           <?php if(session()->get('user_role') == 'Super Admin'): ?>
                                                <div class="mb-3">
                                                    <?php $selectedUserRole = $psits_members['data-user-role'] ?>

                                                    <label for="memberGradeLevel" class="form-label">Role</label>
                                                    <select class="form-control" id="role" name="role">
                                                        <option value="" disabled <?= $selectedUserRole == '' ? 'selected' : '' ?>>-- Select Role --</option>
                                                        <option value="Student" <?= $selectedUserRole == 'Student' ? 'selected' : '' ?>>Student</option>
                                                        <option value="Admin" <?= $selectedUserRole == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                                        <option value="Super Admin" <?= $selectedUserRole == 'Super Admin' ? 'selected' : '' ?>>Super Admin</option>
                                                    </select>
                                                </div>
                                            <?php else: ?>
                                                <input type="hidden" name="role" value="<?= $psits_members['data-user-role'] ?>">
                                            <?php endif; ?>

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
