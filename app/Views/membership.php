<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
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
                                        <form action="<?= base_url('/processMembership') ?>" method="post">
                                            <div class="modal-body">
                                                <!-- Row 1 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="name" class="form-label">Lastname:</label>
                                                        <input type="text" class="form-control" id="name" name="lastname" value="<?= set_value('lastname') ?>" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="dob" class="form-label">Firstname:</label>
                                                        <input type="text" class="form-control" id="dob" name="firstname" value="<?= set_value('firstname') ?>" required>
                                                    </div>
                                                </div>

                                                  <!-- Row 4 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="dob" class="form-label">Middlename:</label>
                                                        <input type="text" class="form-control" id="dob" name="middlename" value="<?= set_value('middlename') ?>" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>" required>
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
                                                        <label for="civil-status" class="form-label">School ID Number:</label>
                                                        <input type="text" class="form-control" id="civil-status" name="Idnumber" value="<?= set_value('Idnumber') ?>" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="citizenship" class="form-label">Course:</label>
                                                        <select class="form-control" id="course" name="course" required>
                                                            <option value="" disabled selected>Select course</option>
                                                            <option value="BS-COMSCI">BS-COMSCI</option>
                                                            <option value="BS-INFOSYS">BS-INFOSYS</option>
                                                            <option value="BS-INFOTECH">BS-INFOTECH</option>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label for="address" class="form-label">Section:</label>
                                                        <select class="form-control" id="section" name="section" required>
                                                            <option value="" disabled selected>Select section</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                        </select>
                                                    </div>                      
                                                </div>

                                                <!-- Row 3 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="age" class="form-label">Age:</label>
                                                        <input type="number" class="form-control" id="age" name="age" value="<?= set_value('age') ?>" required>
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <label for="contact" class="form-label">Contact Number:</label>
                                                        <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value(field: 'contact') ?>" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="height" class="form-label">Grade Level:</label>
                                                        <select class="form-control" id="gradelevel" name="gradelevel" value="<?= set_value('gradelevel') ?>" required>
                                                            <option value="" disabled selected>Select grade level</option>
                                                            <option value="1">1st Year</option>
                                                            <option value="2">2nd Year</option>
                                                            <option value="3">3rd Year</option>
                                                            <option value="4">4th Year</option>
                                                            <option value="5">Above 4th Year</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="" class="form-label">Username:</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" required>
                                                    </div>
                                                    
                                                </div>

                                              

                                                <!-- Row 5 -->
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="" name="password" value="<?= set_value('password') ?>" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="" class="form-label">Confirm Password:</label>
                                                        <input type="password" class="form-control" id="" name="cpassword" value="<?= set_value('cpassword') ?>" required>
                                                    </div>
                                                    
                                                    
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="height" class="form-label">Gmail:</label>
                                                        <input type="email" class="form-control" id="height" name="gmail" value="<?= set_value('gmail') ?>" required>
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

                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('login') ?>">Already Member? Go to login</a></div>
                                    </div>


                                    



                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <br>
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
