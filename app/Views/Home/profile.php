<!-- Profile Page -->
<section class="position-relative text-white text-center hero-section">
  <img
    src="<?= base_url('image/psits-assets/official_officers.jpg') ?>"
    class="img-fluid w-100 h-100 position-absolute top-0 start-0 object-fit-cover hero-bg"
    alt="Profile Banner"
  />
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 1;"></div>
  <div class="container position-relative py-5" style="z-index: 2;">
    <h1 class="display-4 fw-bold">Welcome, <?= session()->get('name') ?? 'Student' ?>!</h1>
    <p class="lead mt-3">Manage your profile, track your activities, and stay updated.</p>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <!-- Profile Card -->
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Profile Information</h4>
          </div>
          <div class="card-body">
            <div class="row g-3 align-items-center">
              <div class="col-md-4 text-center">
                <img src="<?= base_url('image/psits-assets/user-icon.png') ?>" alt="Profile Picture" class="img-fluid rounded-circle border shadow" width="150">
              </div>
              <div class="col-md-8">
                <h5 class="fw-bold mb-2"><?= $user['data-user-firstname'] . ' ' . $user['data-user-lastname']?></h5>
                <p class="mb-1"><strong>Email:</strong> <?= $user['data-user-email'] ?></p>
                <p class="mb-1"><strong>Course:</strong> <?= $user['data-user-course'] ?></p>
                <p class="mb-1"><strong>Year Level:</strong> <?= $user['data-user-gradelevel'] == 5 ? 'Irregular' : $user['data-user-gradelevel'] ?></p>
                <p class="mb-1"><strong>Section:</strong> <?= $user['data-user-section'] ?></p>
                <p class="mb-1"><strong>Student ID:</strong> <?= $user['data-user-student-id'] ?></p>
              </div>

              <div class="text-center mt-4">
                <?php if(session()->get('user_role') == 'Super Admin' || session()->get('user_role') == 'Admin'): ?>
                  <div class="text-center mb-3">
                    <a href="<?= base_url('admin/psits/profile') ?>" class="btn btn-primary">Edit Profile</a>
                    <a href="<?= base_url('admin/psits/change-password') ?>" class="btn btn-secondary">Change Password</a>
                  </div>
                <?php endif; ?>          

                <form action="<?= base_url('/logout') ?>" method="post">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Activities / Links -->
    <?php if(session()->get('user_role') == 'Student') : ?>
      <div class="row mt-5 text-center g-4">
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title text-primary">Edit Profile</h5>
            <p class="card-text">Update your personal information.</p>
            <a href="<?= base_url('profile/' . $user['data-user-id'] . '/edit') ?>" class="btn btn-outline-primary">Edit</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title text-success"> Change Password</h5>
            <p class="card-text">Update your password</p>
            <a href="<?= base_url('change-password/' . $user['data-user-id']) ?>" class="btn btn-outline-success">View</a>
          </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    
  </div>
</section>

<!-- Footer -->
<?php include 'psits-footer.php'; ?>
