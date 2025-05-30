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

        <!-- Main content section -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <div class="row">
                        
                        <!-- Left Side: Add Announcement -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Announcement</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?= base_url('/admin/psits/announcements/add') ?>">
                                        <div class="mb-3">
                                            <label for="announcementTitle" class="form-label">TITLE </label>
                                            <input type="text" class="form-control" id="announcementTitle" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcementTitle" class="form-label">WHO</label>
                                            <input type="text" class="form-control" id="announcementTitle" name="who" required>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcementTitle" class="form-label">WHAT</label>
                                            <input type="text" class="form-control" id="announcementTitle" name="what" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcementTitle" class="form-label">WHEN</label>
                                            <input type="text" class="form-control" id="announcementTitle" name="when" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcementTitle" class="form-label">WHERE</label>
                                            <input type="text" class="form-control" id="announcementTitle" name="where" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcementContent" class="form-label">Content</label>
                                            <textarea class="form-control" id="announcementContent" name="content" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success mt-3">Add Announcement</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Pending Announcements -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Announcements</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Table of pending announcements -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Date Submitted</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Dynamically fetch and display pending announcements -->
                                          
                                         
                                                <!-- Check if there are pending announcements -->
                                            <?php foreach ($announcements as $an): ?>
                                                <tr>
                                                    <td><?= $an['id'] ?></td>
                                                    <td><?= $an['title'] ?></td>

                                                    <td>
                                                                    <!-- Button to trigger modal -->
                                                        <button type="button" class="btn" style="background-color: #0d6efd; border-color: #0d6efd; color: white;" data-bs-toggle="modal" data-bs-target="#announcementModal" data-id="<?= $an['id'] ?>" data-title="<?= $an['title'] ?>" data-content="<?= $an['content'] ?>" data-who="<?= $an['who'] ?>" data-what="<?= $an['what'] ?>" data-when="<?= $an['when'] ?>" data-where="<?= $an['where'] ?>">
                                                                            View 
                                                        </button>
                                                    </td>
                                                    <td><?= $an['created_at'] ?></td>
                                                    <td><?= $an['status'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>

            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <!-- Modal for Viewing Announcement Details -->
<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="announcementModalLabel">Announcement Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Announcement Details -->
        <p><strong>Title:</strong> <span id="modalTitle"></span></p>
        <p><strong>Who:</strong> <span id="modalWho"></span></p>
        <p><strong>What:</strong> <span id="modalWhat"></span></p>
        <p><strong>When:</strong> <span id="modalWhen"></span></p>
        <p><strong>Where:</strong> <span id="modalWhere"></span></p>
        <p><strong>Content:</strong> <span id="modalContent"></span></p>
      </div>
      
    </div>
  </div>
</div>
<script>
    // Add event listener to modal trigger buttons
    const announcementModal = document.getElementById('announcementModal');
    announcementModal.addEventListener('show.bs.modal', function (event) {
        // Get the button that triggered the modal
        const button = event.relatedTarget; 
        
        // Extract the announcement details from the button data attributes
        const id = button.getAttribute('data-id');
        const title = button.getAttribute('data-title');
        const content = button.getAttribute('data-content');
        const who = button.getAttribute('data-who');
        const what = button.getAttribute('data-what');
        const when = button.getAttribute('data-when');
        const where = button.getAttribute('data-where');

        // Update the modal content
        const modalTitle = announcementModal.querySelector('#modalTitle');
        const modalWho = announcementModal.querySelector('#modalWho');
        const modalWhat = announcementModal.querySelector('#modalWhat');
        const modalWhen = announcementModal.querySelector('#modalWhen');
        const modalWhere = announcementModal.querySelector('#modalWhere');
        const modalContent = announcementModal.querySelector('#modalContent');

        modalTitle.textContent = title;
        modalWho.textContent = who;
        modalWhat.textContent = what;
        modalWhen.textContent = when;
        modalWhere.textContent = where;
        modalContent.textContent = content;
    });
</script>


</body>

</html>
