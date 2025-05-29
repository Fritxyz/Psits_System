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
    <h1 class="display-4 fw-bold">Edit Your Profile</h1>
    <p class="lead mt-3">Keep your information up to date for better experience.</p>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Profile Information</h4>
          </div>
          <div class="card-body">
            <form action="<?= base_url('profile/' . $user['data-user-id'] . '/edit/update') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" value="<?= esc($user['data-user-firstname']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" value="<?= esc($user['data-user-lastname']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['data-user-email']) ?>" required>
              </div>

              <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <select name="course" id="course" class="form-select" required>
                  <option value="" disabled>-- Select Course --</option>
                  <option value="BS-COMSCI" <?= $user['data-user-gradelevel'] === 'BS-COMSCI' ? 'selected' : '' ?>>BS-COMSCI</option>
                  <option value="BS-INFOSYS" <?= $user['data-user-gradelevel'] === 'BS-INFOSYS' ? 'selected' : '' ?>>BS-INFOSYS</option>
                  <option value="BS-INFOTECH" <?= $user['data-user-gradelevel'] === 'BS-INFOTECH' ? 'selected' : '' ?>>BS-INFOTECH</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="gradeLevel" class="form-label">Year Level</label>
                <select name="gradeLevel" id="gradeLevel" class="form-select" required>
                  <option value="" disabled>-- Select Year Level --</option>
                  <option value="1" <?= $user['data-user-gradelevel'] === '1' ? 'selected' : '' ?>>1</option>
                  <option value="2" <?= $user['data-user-gradelevel'] === '2' ? 'selected' : '' ?>>2</option>
                  <option value="3" <?= $user['data-user-gradelevel'] === '3' ? 'selected' : '' ?>>3</option>
                  <option value="4" <?= $user['data-user-gradelevel'] === '4' ? 'selected' : '' ?>>4</option>
                  <option value="5" <?= $user['data-user-gradelevel'] === '5' ? 'selected' : '' ?>>Irregular</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-select" required>
                  <option value="" disabled>-- Select Section --</option>
                  <option value="A" <?= $user['data-user-section'] === 'A' ? 'selected' : '' ?>>A</option>
                  <option value="B" <?= $user['data-user-section'] === 'B' ? 'selected' : '' ?>>B</option>
                  <option value="C" <?= $user['data-user-section'] === 'C' ? 'selected' : '' ?>>C</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" name="studentId" id="studentIid" class="form-control" value="<?= esc($user['data-user-student-id']) ?>" required>
              </div>

              <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('/profile/' . $user['data-user-id']) ?>" class="btn btn-secondary">Cancel</a>
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
