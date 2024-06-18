<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
  display: flex;
  }

  .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    padding-top: 20px;
    display: flex;
    flex-direction: column;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #818181;
    display: block;
  }

  .sidenav img {
    width: 60%;
    height: 20%;
    display: block;
    margin: 0 auto 20px;
    border-radius: 80%;
    overflow: hidden;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .main-content {
    flex: 1;
    margin-left: 250px;
    padding: 20px;
  }

  .topnav {
    overflow: hidden;
    background-color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px; /* Added margin to the topnav */
  }

  .form-container {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
    .form-container label {
      display: block;
      margin-bottom: 8px;
    }

    .form-container input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    .form-container button {
      background-color: #4caf50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="topnav">
  <h2>Society Management System</h2>
  <a href="#" onclick="showContent('overview')">Overview</a>
  <a href="#" onclick="showContent('announcements')">Announcements</a>
  <a href="#" onclick="showContent('profile')">Profile</a>
  <a href="#" class="logout">Logout</a>
</div>

<div class="sidenav">
  <img src="/Society_Management/images/user_default.png" alt="User Image">
  <a href="#">Home</a>
  <a href="#" onclick="showContent('profile')">Profile</a>
  <a href="#" onclick="showContent('about')">About Society</a>
  <a href="#" onclick="showContent('funds')">Funds</a>
  <a href="#" onclick="showContent('notice')">Notice</a>
  <a href="#" onclick="showContent('auth')">Authentications</a>
  <a href="#" onclick="showContent('upload')">Upload Documents</a>
  <a href="#" onclick="showContent('bills')">Bills</a>
  <a href="#" onclick="showContent('expenditures')">Expenditures</a>
  <a href="#" onclick="showContent('gatherings')">Gatherings</a>
  <a href="#" onclick="showContent('complaints')">Complaints</a>
  <a href="#" onclick="showContent('contact')">Contact Us</a>
</div>

<div class="main-content">
  <div id="overview">
    <h2>Overview Dashboard</h2>
    <p>Display key statistics, charts, and information about the society.</p>
  </div>

  <div id="announcements" style="display: none;">
    <h2>Announcements</h2>
    <p>Highlight important announcements or news related to the society.</p>
  </div>

  <div id="profile" style="display: none;">
    <h2>User Profile</h2>
    <div id="userDetails">
      <!-- User details will be displayed here -->
    </div>
  </div>

  <!-- Add more content sections as needed -->
</div>

<script>
  function showContent(option) {
    var contentSections = document.querySelectorAll('.main-content > div');
    contentSections.forEach(function(section) {
      section.style.display = 'none';
    });

    var selectedContent = document.getElementById(option);
    if (selectedContent) {
      selectedContent.style.display = 'block';
      
      // Additional logic for demo: Display sample user details in the profile section
      if (option === 'profile') {
        showUserProfile();
      }
    }
  }

  function showUserProfile() {
    var userDetailsDiv = document.getElementById('userDetails');
    userDetailsDiv.innerHTML = `
      <p><strong>Name:</strong> John Doe</p>
      <p><strong>Address:</strong> 123 Main St, Cityville</p>
      <p><strong>Contact:</strong> +1 (555) 123-4567</p>
      <p><strong>Email:</strong> john@example.com</p>
      <!-- Add more user details as needed -->
      
      <!-- Dynamic form for updating user details -->
      <div class="form-container">
        <h3>Edit Profile</h3>
        <label for="newName">New Name:</label>
        <input type="text" id="newName" placeholder="Enter new name">

        <label for="newAddress">New Address:</label>
        <input type="text" id="newAddress" placeholder="Enter new address">

        <label for="newContact">New Contact:</label>
        <input type="text" id="newContact" placeholder="Enter new contact">

        <button onclick="updateUserProfile()">Update Profile</button>
      </div>
    `;
  }

  function updateUserProfile() {
    // Sample function for updating user profile (in a real app, this would involve server-side logic)
    var newName = document.getElementById('newName').value;
    var newAddress = document.getElementById('newAddress').value;
    var newContact = document.getElementById('newContact').value;

    // Update the displayed user details
    var userDetailsDiv = document.getElementById('userDetails');
    userDetailsDiv.innerHTML += `
      <p><strong>New Name:</strong> ${newName}</p>
      <p><strong>New Address:</strong> ${newAddress}</p>
      <p><strong>New Contact:</strong> ${newContact}</p>
    `;
  }
</script>

</body>
</html>
