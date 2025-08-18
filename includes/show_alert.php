<?php if (isset($_SESSION['alert_message']) && !empty($_SESSION['alert_message'])): ?>
<style>
#customAlert {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: flex; justify-content: center; align-items: center;
  z-index: 1000;
}
.alert-content {
  background: white; padding: 20px; border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  text-align: center; position: relative;
}
.close-button {
  position: absolute; top: 10px; right: 10px;
  cursor: pointer; font-size: 20px;
}
</style>

<div id="customAlert">
  <div class="alert-content">
    <span class="close-button">&times;</span>
    <p id="alertMessage"><?= $_SESSION['alert_message']; ?></p>
    <button id="alertOkButton">OK</button>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const alertBox = document.getElementById("customAlert");
  const closeBtn = document.querySelector(".close-button");
  const okBtn = document.getElementById("alertOkButton");

  closeBtn.onclick = () => alertBox.style.display = "none";
  okBtn.onclick = () => alertBox.style.display = "none";

  // Auto hide after 3 seconds (optional)
  // setTimeout(() => alertBox.style.display = "none", 3000);
});
</script>
<?php endif; ?>
