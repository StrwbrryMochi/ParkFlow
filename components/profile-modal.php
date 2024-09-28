<div class="profile-modal-overlay">
  <div class="profile-modal">
    <div class="profile-background"></div>
    <div class="profile-image-wrapper">
      <img src="<?php echo htmlspecialchars($Photo); ?>" alt="Profile Image">
      <span></span>
    </div>
    <div class="profile-details-wrapper">
      <div class="profile-modal-name">
        <div class="editProfile">
            <button><i class='bx bxs-pencil'></i> Edit Profile</button>
        </div>
        <h2><?php echo htmlspecialchars($FirstName). ' ' .htmlspecialchars($LastName); ?></h2>
        <p><?php echo htmlspecialchars($Email); ?></p>
        </div>
        <div class="profile-info-wrapper">
            <div class="profile-info">
            <form action="../php/fetchLoginData.php" method="POST" class="form-container">
    <div class="form-row">
        <div class="form-group">
            <input type="text" id="firstName" name="FirstName" autocomplete="off" value="<?php echo htmlspecialchars($FirstName) ?>" readonly placeholder=" ">
            <label for="firstName">First Name</label>
        </div>
        <div class="form-group">
            <input type="text" id="lastName" name="LastName" autocomplete="off" value="<?php echo htmlspecialchars($LastName) ?>" readonly placeholder=" ">
            <label for="lastName">Last Name</label>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <input name="Email" type="email" placeholder=" " value="<?php echo htmlspecialchars($Email) ?>" readonly />
            <label>Email</label>
        </div>
        <div class="form-group">
            <input type="text" id="gender" name="Gender" autocomplete="off" value="<?php echo htmlspecialchars($Gender) ?>" readonly placeholder=" ">
            <label for="gender">Gender</label>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <input type="tel" id="phoneNumber" name="PhoneNumber" autocomplete="off" value="<?php echo htmlspecialchars($PhoneNumber) ?>" readonly placeholder=" ">
            <label for="phoneNumber">Phone Number</label>
        </div>
        <div class="form-group">
            <input type="date" id="dob" name="DateofBirth" value="<?php echo htmlspecialchars($DateofBirth) ?>" readonly placeholder=" ">
            <label for="dob">Date of Birth</label>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <input type="text" id="address" name="Address" autocomplete="off" value="<?php echo htmlspecialchars($Address) ?>" readonly placeholder=" ">
            <label for="address">Address</label>
        </div>
        <div class="form-group">
            <input type="text" id="accountType" name="accountType" autocomplete="off" value="<?php echo htmlspecialchars($account_Type) ?>" readonly placeholder=" ">
            <label for="accountType">Account Type</label>
        </div>
    </div>
</form>
            </div>
      </div>
    </div>
  </div>
</div>