<!-- Floating Chat Widget -->
<div id="chatWidget">
  <div class="chat-header">PSITS Support</div>
  <div id="chatBox">
    <img src="<?= base_url('image/psits.jpg') ?>" alt="PSITS Logo" />
    <p>Need help? Connect with us on Facebook!</p>
    <a href="https://www.facebook.com/messages/t/111137135097368" target="_blank">Message Us</a>
  </div>
</div>

<!-- Chat Toggle Button -->
<button id="chatToggleBtn" onclick="toggleChat()">💬</button>

<style>
  #chatWidget {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: auto;
    max-width: 240px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    display: none;
    flex-direction: column;
    padding: 0;
    margin: 0;
  }

  #chatWidget.active {
    display: block;
  }

  .chat-header {
    background-color: #0d6efd;
    color: white;
    padding: 6px;
    font-size: 14px;
    text-align: center;
    font-weight: bold;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  #chatBox {
    text-align: center;
    padding: 8px;
  }

  #chatBox img {
    width: 100px;
    height: 60px;
    border-radius: 50%;
    margin-bottom: 6px;
  }

  #chatBox p {
    font-size: 13px;
    margin: 6px 0;
  }

  #chatBox a {
    display: inline-block;
    font-size: 13px;
    background-color: #0d6efd;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    text-decoration: none;
  }

  #chatToggleBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #0d6efd;
    color: white;
    border: none;
    font-size: 24px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<script>
  function toggleChat() {
    const chatWidget = document.getElementById("chatWidget");
    chatWidget.classList.toggle("active");
  }
</script>
