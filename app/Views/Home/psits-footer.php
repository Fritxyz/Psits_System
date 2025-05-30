  <?php include 'chatbot.php' ?>
  
  <footer class="bg-dark text-center text-white py-4">
    <p class="mb-0">&copy; <?= date('Y') ?> PSITS. All rights reserved.</p>
  </footer>

    <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    // Use JavaScript to hide the success message after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 2000); // 2000 milliseconds = 2 seconds

    setTimeout(function() {
        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 2000); // 2000 milliseconds = 2 seconds
</script>