<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Membership</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Membership</h3>
                                    <?php if (session()->getFlashdata('success')): ?>
                                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('/process-membership') ?>" method="post">
                                            <div class="modal-body">
                                                <!-- Row 1 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="name" class="form-label">Lastname:</label>
                                                        <input type="text" class="form-control" id="name" name="lastname" value="<?= $user['data-user-firstname'] ?>" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label for="dob" class="form-label">Firstname:</label>
                                                        <input type="text" class="form-control" id="dob" name="firstname" value="<?= $user['data-user-lastname'] ?>" readonly>
                                                    </div>
                                                </div>

                                                  <!-- Row 4 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address" name="address" required>
                                                    </div>
                                                </div>

                                                <!-- Row 2 -->
                                                <div class="row mb-3">
                                                   <div class="col">
                                                        <label for="gender" class="form-label">Gender:</label>
                                                        <select class="form-control" id="gender" name="gender" required>
                                                            <option value="" disabled selected>Select gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label for="civil-status" class="form-label">Student ID:</label>
                                                        <input type="text" class="form-control" id="civil-status" name="Idnumber" value="<?= $user['data-user-student-id'] ?>" readonly>
                                                    </div>

                                                    <div class="col">
                                                        <label for="course" class="form-label">Course:</label>
                                                        <select class="form-control" id="course" name="course" disabled>
                                                            <option value="" disabled>-- Select Course --</option>
                                                            <option value="BS-COMSCI" <?= $user['data-user-course'] == 'BS-COMSCI' ? 'selected' : '' ?>>BS-COMSCI</option>
                                                            <option value="BS-INFOSYS" <?= $user['data-user-course'] == 'BS-INFOSYS' ? 'selected' : '' ?>>BS-INFOSYS</option>
                                                            <option value="BS-INFOTECH" <?= $user['data-user-course'] == 'BS-INFOTECH' ? 'selected' : '' ?>>BS-INFOTECH</option>
                                                        </select>

                                                        <input type="hidden" name="course" value="<?= $user['data-user-course'] ?>">
                                                    </div>

                                                    <div class="col">
                                                        <label for="address" class="form-label">Section:</label>
                                                        <select class="form-control" id="section" name="section" disabled>
                                                            <option value="" disabled>-- Select Section -- </option>
                                                            <option value="A" <?= $user['data-user-section'] == 'A' ? 'selected' : '' ?>>A</option>
                                                            <option value="B" <?= $user['data-user-section'] == 'B' ? 'selected' : '' ?>>B</option>
                                                            <option value="C" <?= $user['data-user-section'] == 'C' ? 'selected' : '' ?>>C</option>
                                                        </select>

                                                        <input type="hidden" name="section" value="<?= $user['data-user-section'] ?>">
                                                    </div>                      
                                                </div>

                                                <!-- Row 3 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="age" class="form-label">Age:</label>
                                                        <input type="number" class="form-control" id="age" name="age" value="" required>
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <label for="contact" class="form-label">Contact Number:</label>
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="ex. (09123456789/+639123456789)" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="height" class="form-label">Grade Level:</label>
                                                        <select class="form-control" id="gradelevel" name="gradelevel" disabled>
                                                            <option value="" disabled>Select grade level</option>
                                                            <option value="1" <?= $user['data-user-gradelevel'] == '1' ? 'selected' : '' ?>>1</option>
                                                            <option value="2" <?= $user['data-user-gradelevel'] == '2' ? 'selected' : '' ?>>2</option>
                                                            <option value="3" <?= $user['data-user-gradelevel'] == '3' ? 'selected' : '' ?>>3</option>
                                                            <option value="4" <?= $user['data-user-gradelevel'] == '4' ? 'selected' : '' ?>>4</option>
                                                            <option value="5" <?= $user['data-user-gradelevel'] == '5' ? 'selected' : '' ?>>Irregular</option>
                                                        </select>

                                                        <input type="hidden" name="gradelevel" value="<?= $user['data-user-gradelevel'] ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="height" class="form-label">Gmail:</label>
                                                        <input type="email" class="form-control" id="height" name="gmail" value="<?= $user['data-user-email'] ?>" readonly>
                                                    </div>
                                                </div>

<!--                                            
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="father-name" class="form-label">Father’s Name:</label>
                                                        <input type="text" class="form-control" id="father-name" name="father-name" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="father-occupation" class="form-label">Occupation:</label>
                                                        <input type="text" class="form-control" id="father-occupation" name="father-occupation" required>
                                                    </div>
                                                </div>

                                               
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="mother-name" class="form-label">Mother’s Name:</label>
                                                        <input type="text" class="form-control" id="mother-name" name="mother-name" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="mother-occupation" class="form-label">Occupation:</label>
                                                        <input type="text" class="form-control" id="mother-occupation" name="mother-occupation" required>
                                                    </div>       
                                                </div>

                                               
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="emergency-contact-name" class="form-label">Person to contact in case of emergency:</label>
                                                        <input type="text" class="form-control" id="emergency-contact-name" name="emergency-contact-name" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="emergency-contact-number" class="form-label">Contact Number:</label>
                                                        <input type="text" class="form-control" id="emergency-contact-number" name="emergency-contact-number" required>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="d-flex justify-content-center mt-3">
                                                <button type="submit" name="adding" class="btn btn-primary">Submit</button>
                                            </div> <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <br>

            <!-- todo: to fix the membership controller  -->
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PSITS 2025 
                                <a href="https://www.facebook.com/profile.php?id=100086506355956" target="_blank" rel="noopener noreferrer">
                                 <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
