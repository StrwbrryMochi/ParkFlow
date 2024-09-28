document.addEventListener("DOMContentLoaded", function () {
  const profileModalOverlay = document.querySelector(".profile-modal-overlay");
  const profileModal = document.querySelector(".profile-modal");
  const profileSnippetOverlay = document.querySelector(
    ".profile-snippet-overlay"
  );
  const profileSnippet = document.querySelector(".profile-snippet");

  // Function to open the profile modal
  window.openProfile = function () {
    // Close the profile snippet if it's open
    if (profileSnippetOverlay.classList.contains("show")) {
      closeProfileSnippet();
    }

    // Toggle the profile modal
    const isVisible = profileModalOverlay.classList.contains("show");

    if (isVisible) {
      closeProfileModal();
    } else {
      profileModalOverlay.style.display = "block";
      setTimeout(() => {
        profileModalOverlay.classList.add("show");
        profileModal.classList.add("show");
      }, 10);
    }

    // Close modal on overlay click
    window.addEventListener("click", function (event) {
      if (event.target === profileModalOverlay) {
        closeProfileModal();
      }
    });
  };

  // Function to close profile modal
  function closeProfileModal() {
    profileModalOverlay.classList.remove("show");
    profileModal.classList.remove("show");
    setTimeout(() => {
      profileModalOverlay.style.display = "none";
    }, 300);
  }

  // Function to open the profile snippet
  window.profileSnippet = function () {
    // Close the profile modal if it's open
    if (profileModalOverlay.classList.contains("show")) {
      closeProfileModal();
    }

    // Toggle the profile snippet
    const isVisible = profileSnippetOverlay.classList.contains("show");

    if (isVisible) {
      closeProfileSnippet();
    } else {
      profileSnippetOverlay.style.display = "block";
      setTimeout(() => {
        profileSnippetOverlay.classList.add("show");
        profileSnippet.classList.add("show");
      }, 10);
    }

    // Close snippet on overlay click
    window.addEventListener("click", function (event) {
      if (event.target === profileSnippetOverlay) {
        closeProfileSnippet();
      }
    });
  };

  // Function to close profile snippet
  function closeProfileSnippet() {
    profileSnippetOverlay.classList.remove("show");
    profileSnippet.classList.remove("show");
    setTimeout(() => {
      profileSnippetOverlay.style.display = "none";
    }, 300);
  }
});
