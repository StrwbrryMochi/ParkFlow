<div class="profile-snippet-overlay">
  <div class="profile-snippet">
    <div class="snippet-background"></div>
    <div class="snippet-profile">
      <img src="<?php echo htmlspecialchars($Photo); ?>" alt="Profile Image" onclick="openProfile()">
      <span class="circle"></span>
    </div>
    <div class="snippet-details-wrapper">
      <div class="snippet-details">
        <h2><?php echo htmlspecialchars($FirstName); ?></h2>
        <p><?php echo htmlspecialchars($Email); ?></p>
        <div class="snippet-buttons-wrapper">
          <button><i class='bx bxs-pencil'></i> Edit Profile</button>
          <div class="snippet-divider"></div>
          <button>Online</button>
        </div>
        <div class="snippet-logout">
          <form action="../php/logout.php" method="POST">
            <button><i class='bx bx-log-out' ></i> Log out</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>