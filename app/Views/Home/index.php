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
  
  <!-- Hero Section -->
  <section class="position-relative text-white text-center hero-section">
    <img
      src="<?= base_url('image/psits-assets/official_officers.jpg') ?>"
      class="img-fluid w-100 h-100 position-absolute top-0 start-0 object-fit-cover"
      alt="PSITS Officers"
    />
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5; z-index: 1;"></div>

    <div class="container position-relative py-5" style="z-index: 2;">
      <h1 class="display-4 fw-bold">Unleash your imagination, embrace your freedom</h1>
      <p class="lead mt-4">Welcome to PSITS-COTSU! Your digital hub for tech news, events, and student recognition.</p>
      <div class="mt-4">
        <button class="btn btn-light text-primary me-3">Enroll Now</button>
        <button class="btn btn-outline-light">View Courses</button>
      </div>
    </div>
  </section>

  <!-- Requirements Section -->
  <section class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="fw-bold">Ready to take the leap?</h2>
      <p class="fs-5">Enroll in <span class="text-danger fw-bold">PSITS</span> and start your journey towards success. Your future begins here!</p>
      <h3 class="mt-4">Requirements</h3>
      <p class="fs-5 mt-3">LOREM<br>LOREM<br>LOREM<br>LOREM<br>LOREM<br>STUDENT ID</p>
    </div>
  </section>

  <!-- Programs Section -->
  <section class="py-5">
    <div class="container text-center">
      <h1 class="fw-bold mb-5">Quick Access</h1>
      <div class="row g-4 justify-content-center">
        <!-- IT -->
        <div class="col-md-4">
          <div class="card h-100 shadow">
            <div class="card-header bg-primary text-white fw-bold">Information Technology</div>
            <div class="card-body">
              <img src="<?= base_url('image/psits-assets/IT.png') ?>" alt="IT" class="mb-3" width="60" />
              <p>Focuses on implementing, supporting, and managing computer-based systems.</p>
              <ul class="list-unstyled text-start">
                <li>✔ Network Management</li>
                <li>✔ Technical Support</li>
                <li>✔ System Integration</li>
                <li>✔ Infrastructure Management</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent">
              <button class="btn btn-primary">Learn more</button>
            </div>
          </div>
        </div>
        <!-- IS -->
        <div class="col-md-4">
          <div class="card h-100 shadow">
            <div class="card-header bg-success text-white fw-bold">Information Systems</div>
            <div class="card-body">
              <img src="<?= base_url('image/psits-assets/IS.png') ?>" alt="IS" class="mb-3" width="60" />
              <p>Integrates technology with business processes to optimize decision-making.</p>
              <ul class="list-unstyled text-start">
                <li>✔ Business Process Analysis</li>
                <li>✔ Database Management</li>
                <li>✔ Enterprise Architecture</li>
                <li>✔ Decision Support Systems</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent">
              <button class="btn btn-success">Learn more</button>
            </div>
          </div>
        </div>
        <!-- CS -->
        <div class="col-md-4">
          <div class="card h-100 shadow">
            <div class="card-header bg-danger text-white fw-bold">Computer Science</div>
            <div class="card-body">
              <img src="<?= base_url('image/psits-assets/CS.png') ?>" alt="CS" class="mb-3" width="60" />
              <p>Study of computers, algorithms, AI, and theoretical foundations of computation.</p>
              <ul class="list-unstyled text-start">
                <li>✔ Algorithms & Data Structures</li>
                <li>✔ Programming Languages</li>
                <li>✔ Artificial Intelligence</li>
                <li>✔ Computational Theory</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent">
              <button class="btn btn-danger">Learn more</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Announcements -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h1>Latest Announcement :</h1>
      <div class="mt-4">
        <img
          src="<?= base_url('image/psits-assets/LATEST_ANN.jpeg') ?>"
          class="img-fluid rounded"
          alt="Latest Announcement"
        />
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'psits-footer.php'; ?>


