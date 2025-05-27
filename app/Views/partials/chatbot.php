<!-- Floating Chat Widget -->
<div id="chatWidget">
  <div class="chat-header bg-primary text-white p-2 fw-bold">Support Chat</div>
  <div id="chatBox" class="flex-grow-1 p-2 overflow-auto bg-light"></div>
  <div class="input-group">
    <input type="text" id="userInput" class="form-control" placeholder="Type a message...">
    <button class="btn btn-primary" onclick="sendMessage()">Send</button>
  </div>
</div>

<!-- Chat Toggle Button -->
<button id="chatToggleBtn" onclick="toggleChat()">💬</button>


<script>
    function toggleChat() {
        const chatWidget = document.getElementById("chatWidget");
        chatWidget.classList.toggle("active");
    }
</script>