// Profile Modal
function openProfile() {
  const profileModal = document.querySelector(".profile-modal");
  const notifModal = document.querySelector(".notif-modal");

  // Close the notification modal if it's open
  if (notifModal.style.display === "block") {
    notifModal.style.display = "none";
  }

  // Toggle the profile modal
  profileModal.style.display =
    profileModal.style.display === "block" ? "none" : "block";
}

// Notification Modal
function openNotif() {
  const notifModal = document.querySelector(".notif-modal");
  const profileModal = document.querySelector(".profile-modal");

  // Close the profile modal if it's open
  if (profileModal.style.display === "block") {
    profileModal.style.display = "none";
  }

  // Toggle the notification modal
  notifModal.style.display =
    notifModal.style.display === "block" ? "none" : "block";
}
