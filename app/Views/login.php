<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3>
                                        <?php if (session()->getFlashdata('success')): ?>
                                            <div class="alert alert-success" id="successMessage">
                                                <?= esc(session()->getFlashdata('success')) ?>
                                            </div>
                                        <?php endif; ?>

                                      

                                        <?php if (session()->getFlashdata('errors')): ?>
                                            <div class="alert alert-danger" id="successMessage">
                                                <ul>
                                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                        <li><?= esc($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('processLogin') ?>" method="post">
                                            
                                                      
                                          <?php if (session()->getFlashdata('error')): ?>
                                                <div class="alert alert-danger" id="successMessage">
                                                    <ul>
                                                        <?php 
                                                        $errors = session()->getFlashdata('error');
                                                        if (is_array($errors)): 
                                                            foreach ($errors as $error): ?>
                                                                <li><?= esc($error) ?></li>
                                                            <?php endforeach; 
                                                        else: ?>
                                                            <li><?= esc($errors) ?></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                           <?php endif; ?>


                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="username" name="username" />
                                                <label for="inputEmail">Username </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary btn-block">login
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('membership') ?>">Apply Psits Membership!</a></div>
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
