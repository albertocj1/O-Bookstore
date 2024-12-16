<!DOCTYPE html>
<html lang="en">
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f9f9f9;
}

.container {
    display: flex;
    width: 100%;
    max-width: 1100px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #f7f7f7;
    border-right: 1px solid #e0e0e0;
    padding: 20px;
}

.profile-section {
    text-align: center;
    margin-bottom: 30px;
}

.avatar {
    width: 80px;
    height: 80px;
    background-color: #ccc;
    border-radius: 50%;
    margin: 0 auto;
}

.user-name {
    margin-top: 10px;
    font-weight: bold;
    font-size: 16px;
}

.edit-profile {
    font-size: 12px;
    text-decoration: none;
    color: #007bff;
}

.menu ul {
    list-style: none;
    margin-top: 20px;
}

.menu li {
    padding: 10px 0;
    font-size: 14px;
    color: #555;
}

.menu li.active {
    font-weight: bold;
    color: #000;
}

/* Main Content */
.content {
    flex-grow: 1;
    padding: 40px;
}

h2 {
    margin-bottom: 20px;
    font-size: 20px;
}

.address-form {
    width: 100%;
}

.form-group {
    display: flex;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.form-group input {
    flex: 1;
    padding: 10px;
    margin-right: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group input:last-child {
    margin-right: 0;
}

.label-group {
    align-items: center;
}

.label-group label {
    margin-right: 10px;
    font-size: 14px;
    font-weight: bold;
}

.label-btn {
    padding: 5px 15px;
    margin-right: 10px;
    background-color: #e0e0e0;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.label-btn.active {
    background-color: #4caf50;
    color: #fff;
}

.default-address {
    display: flex;
    align-items: center;
    font-size: 14px;
}

.default-address input {
    margin-right: 10px;
}

.buttons {
    display: flex;
    justify-content: flex-end;
}

.cancel-btn,
.submit-btn {
    padding: 10px 20px;
    border: none;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
}

.cancel-btn {
    background-color: #ccc;
    color: #000;
    margin-right: 10px;
}

.submit-btn {
    background-color: #4caf50;
    color: #fff;
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - New Address</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-section">
                <div class="avatar"></div>
                <p class="user-name">John Doe</p>
                <a href="#" class="edit-profile">✎ Edit Profile</a>
            </div>
            <button type="button" class="btn btn-primary active">Active Primary</button>
            <nav class="menu">
                <ul>
                    <li><strong>My Account</strong></li>
                    <li>Profile</li>
                    <li>Banks & Card</li>
                    <li class="active">Addresses</li>
                    <li>Change Password</li>
                    <li>Privacy Settings</li>
                </ul>
                <ul>
                    <li><strong>My Purchases</strong></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <h2>New Address</h2>
            <form class="address-form">
                <div class="form-group">
                    <input type="text" placeholder="Full Name">
                    <input type="text" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Region, Province, City, Barangay">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Postal Code">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Street Name, Building, House No.">
                </div>
                <div class="form-group label-group">
                    <label>Label As:</label>
                    <button type="button" class="label-btn active">Home</button>
                    <button type="button" class="label-btn">Work</button>
                </div>
                <div class="form-group default-address">
                    <input type="checkbox" id="default">
                    <label for="default">Set as Default Address</label>
                </div>
                <div class="form-group buttons">
                    <button type="button" class="cancel-btn">Cancel</button>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

