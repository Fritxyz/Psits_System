<div class="card-header">
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

<!-- Edit Profile Page -->
<section class="position-relative text-white text-center hero-section">
  <img
    src="<?= base_url('image/psits-assets/official_officers.jpg') ?>"
    class="img-fluid w-100 h-100 position-absolute top-0 start-0 object-fit-cover hero-bg"
    alt="Profile Banner"
  />
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 1;"></div>
  <div class="container position-relative py-5" style="z-index: 2;">
    <h1 class="display-4 fw-bold">Change Password</h1>
    <p class="lead mt-3">Keep your information up to date for better experience.</p>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Change Password</h4>
          </div>
          <div class="card-body">
            <form action="<?= base_url('change-password/' . $userId . '/update') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control"  required>
              </div>

              <div class="d-flex justify-content-between mt-4">
                
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include 'psits-footer.php'; ?>
