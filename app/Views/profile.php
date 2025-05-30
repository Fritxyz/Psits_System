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
                                <h2>PROFILE</h2>
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

                            <form action="<?= site_url('admin/psits/profile/update') ?>" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">First Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $user['data-user-firstname'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $user['data-user-lastname'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Student Id</label>
                                    <input type="text" id="studentid" name="studentid" class="form-control" value="<?= $user['data-user-student-id'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="course" class="form-label">Course</label>
                                    <select class="form-control" id="course" name="course" required>
                                        <option value="" disabled <?= empty($user['data-user-course']) ? 'selected' : '' ?>>-- Select Course --</option>
                                        <option value="BS-COMSCI" <?= $user['data-user-course'] === 'BS-COMSCI' ? 'selected' : '' ?>>BS-COMSCI</option>
                                        <option value="BS-INFOSYS" <?= $user['data-user-course'] === 'BS-INFOSYS' ? 'selected' : '' ?>>BS-INFOSYS</option>
                                        <option value="BS-INFOTECH" <?= $user['data-user-course'] === 'BS-INFOTECH' ? 'selected' : '' ?>>BS-INFOTECH</option>
                                    </select>
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <select class="form-control" id="section" name="section" required>
                                        <option value="" disabled <?= empty($user['data-user-section']) ? 'selected' : '' ?>>-- Select Course --</option>
                                        <option value="A" <?= $user['data-user-section'] === 'A' ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= $user['data-user-section'] === 'B' ? 'selected' : '' ?>>B</option>
                                        <option value="C" <?= $user['data-user-section'] === 'C' ? 'selected' : '' ?>>C</option>
                                    </select>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="gradelevel" class="form-label">Grade Level</label>
                                    <select class="form-control" id="gradelevel" name="gradelevel" required>
                                        <option value="" disabled <?= empty($user['data-user-gradelevel']) ? 'selected' : '' ?>>-- Select Grade Level --</option>
                                        <option value="1" <?= $user['data-user-gradelevel'] === '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $user['data-user-gradelevel'] === '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $user['data-user-gradelevel'] === '3' ? 'selected' : '' ?>>3</option>
                                        <option value="4" <?= $user['data-user-gradelevel'] === '4' ? 'selected' : '' ?>>4</option>
                                        <option value="5" <?= $user['data-user-gradelevel'] === '5' ? 'selected' : '' ?>>Irregular</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?= $user['data-user-email'] ?>">
                                </div> 
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
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