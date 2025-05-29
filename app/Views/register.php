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
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                        <?php if (session()->getFlashdata('errors')): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                        <li><?= esc($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('process_register') ?>" method="post" >
                                            <div class="row mb-3">
                                                <!-- <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                -->
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="firstName" id="firstName" type="text" placeholder="ex. Juan Dela Cruz" />
                                                        <label for="firstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="lastName" id="lastName" type="text" placeholder="ex. Juan Dela Cruz" />
                                                        <label for="lastName">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="studentId" id="studentId" type="number" placeholder="ex. 2250000" />
                                                        <label for="studentId">Student ID</label>
                                                    </div>
                                                </div>
                                                
                                               <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                       <select class="form-control" id="course" name="course" required>
                                                            <option value="" disabled selected>Select course</option>
                                                            <option value="BS-INFOTECH">BS-INFOTECH</option>
                                                            <option value="BS-COMSCI">BS-COMSCI</option>
                                                            <option value="BS-INFOSYS">BS-INFOSYS</option>
                                                        </select>
                                                        <label for="course">Course</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                       <select class="form-control" id="section" name="section" required>
                                                            <option value="" disabled selected>Select section</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                        </select>
                                                        <label for="section">Section</label>
                                                    </div>
                                                </div>

                                                 <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                       <select class="form-control" id="gradeLevel" name="gradeLevel" required>
                                                            <option value="" disabled selected>Select grade level</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">Irregular</option>
                                                        </select>
                                                        <label for="course">Grade Level</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="cpassword" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g-recaptcha mb-3" data-sitekey="<?= getenv('RECAPTCHA_SITE_KEY') ?>"></div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary btn-block">Create Account

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('login') ?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>
</html>