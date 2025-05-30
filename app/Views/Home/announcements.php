

<section class="py-5 bg-light text-center">
  <div class="container">
    <h1 class="fw-bold">PSITS Announcements</h1>
    <p class="fs-5 text-muted">Stay updated with the latest official updates from PSITS officers and staff.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <?php if (!empty($announcements)): ?>
      <div class="row g-4">
        <?php foreach ($announcements as $announcement): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><?= esc($announcement['title']) ?></h5>
                <p class="card-text"><strong>What:</strong> <?= esc($announcement['what']) ?></p>
                <p class="card-text"><strong>Who:</strong> <?= esc($announcement['who']) ?></p>
                <p class="card-text"><strong>When:</strong> <?= esc($announcement['when']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>
  </div>
</section>



<br>
<br>
<br>
<br>
<br>
<br>

<?php include 'psits-footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
