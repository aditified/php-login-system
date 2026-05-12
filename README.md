## 🔐 PHP Login System — Full CRUD with MySQL

A complete user authentication and management system built with **PHP**, **MySQL**, **Bootstrap 5**, and **SweetAlert2**. This project covers user registration, login, password reset, and full admin-level CRUD (Create, Read, Update, Delete) operations on user records.
---

## 📁 Project Structure

```
loginform_project/
│
├── connection.php      # Database connection file
├── index.php           # User Registration page
├── login.php           # User Login page
├── forget.php          # Forgot / Reset Password page
├── view.PHP            # Admin panel — View all users (Read)
├── update.php          # Update user details (Edit)
├── delete.php          # Delete a user record
└── style.css           # Custom dark-themed stylesheet
```

---

## ✨ Features

| Feature | Description |
|---|---|
| 🧾 **User Registration** | Register with name, email, and password with full validation |
| 🔑 **User Login** | Authenticate via email and password |
| 🔄 **Forgot Password** | Reset password using registered email |
| 👁️ **View All Users** | Admin table showing all registered users |
| ✏️ **Update User** | Edit name, email, and password of any user |
| 🗑️ **Delete User** | Remove a user record with confirmation |
| ✅ **Form Validation** | Client-safe server-side validation on all forms |
| 🎨 **Dark UI Theme** | Sleek dark-themed login/register UI via custom CSS |
| 🍬 **SweetAlert2 Popups** | Beautiful success/error alerts instead of plain browser popups |
| 📱 **Responsive Design** | Bootstrap 5 grid ensures mobile-friendly layout |

---

## 🛠️ Tech Stack

- **Backend:** PHP (procedural)
- **Database:** MySQL via MySQLi extension
- **Frontend:** HTML5, CSS3
- **CSS Framework:** Bootstrap 5.3.8
- **Alert Library:** SweetAlert2 v11
- **Local Server:** XAMPP (Apache + MySQL)

---

## ⚙️ How to Run This Project Locally (XAMPP + VS Code)

### Step 1 — Install XAMPP

Download and install XAMPP from the official site:
👉 [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)

Choose the version matching your operating system (Windows / macOS / Linux).

---

### Step 2 — Place the Project in `htdocs`

> ⚠️ **This is the most important step.** PHP files must live inside XAMPP's `htdocs` folder to be served by Apache.

Navigate to your XAMPP installation directory and find the `htdocs` folder:

| OS | Default Path |
|---|---|
| Windows | `C:\xampp\htdocs\` |
| macOS | `/Applications/XAMPP/htdocs/` |
| Linux | `/opt/lampp/htdocs/` |

Create a new folder for the project inside `htdocs`:

```
C:\xampp\htdocs\loginproject\
```

Copy all project files into this folder:

```
C:\xampp\htdocs\loginproject\
├── connection.php
├── index.php
├── login.php
├── forget.php
├── view.PHP
├── update.php
├── delete.php
└── style.css
```

---

### Step 3 — Start XAMPP Services

Open the **XAMPP Control Panel** and start:
- ✅ **Apache** (web server)
- ✅ **MySQL** (database)

Both should show a green status indicator.

---

### Step 4 — Create the Database

1. Open your browser and go to:
   ```
   http://localhost/phpmyadmin
   ```

2. Click **"New"** in the left sidebar to create a new database.

3. Name the database exactly:
   ```
   loginform_db
   ```
   Then click **Create**.

4. Your database is now ready.

---

### Step 5 — Open in VS Code (Optional but Recommended)

1. Open **VS Code**.
2. Go to **File → Open Folder** and select:
   ```
   C:\xampp\htdocs\loginproject\
   ```
3. Install the recommended extension for PHP development:
   - 🔌 **PHP Intelephense** — for syntax highlighting and IntelliSense
   - 🔌 **PHP Server** *(optional)* — though for this project, XAMPP handles serving

> You will edit files in VS Code, but always run/test them via `http://localhost/...` in the browser.

---

### Step 6 — Run the Project

Open your browser and visit:

```
http://localhost/loginproject/index.php
```

You should see the **Register** page. Start from there!

---

## 🗺️ Application Flow

```
index.php (Register)
    │
    ▼
login.php (Login)
    │
    ├──► forget.php (Forgot Password → Reset)
    │
    ▼
view.PHP (Admin Panel — all users)
    │
    ├──► update.php?id=X  (Edit user)
    │
    └──► delete.php?id=X  (Delete user)
```

---

## 📄 File-by-File Breakdown

### `connection.php`
Establishes a MySQLi connection to the `loginform_db` database using `localhost`, username `root`, and no password (default XAMPP config). All other files include this via `include("connection.php")`.

---

### `index.php` — Registration
- Collects **name**, **email**, and **password**
- Server-side validation:
  - All fields required
  - Valid email format check (`FILTER_VALIDATE_EMAIL`)
  - Password must be **6–20 characters**, only letters, digits, `_` and `.`
- On success, inserts into the `login` table and shows a SweetAlert success popup
- Links to `login.php` for existing users

---

### `login.php` — Login
- Takes **email** and **password**
- Runs the same validation as registration
- Queries the DB for the email; if found, compares the password directly
- On success → redirects to `view.PHP` (admin panel)
- On failure → shows appropriate SweetAlert error (wrong password / email not found)
- Links to `forget.php` and `index.php`

---

### `forget.php` — Forgot Password
- Takes the user's **registered email** and a **new password**
- Checks if the email exists in the database
- If found → updates the password with the new one
- On success → redirects to `login.php` with a success popup
- On failure → shows "Email Not Found" SweetAlert

---

### `view.PHP` — Admin Panel
- Fetches **all users** from the `login` table
- Displays them in a Bootstrap-styled table with columns: **Name, Email, Password, Operations**
- Each row has an **Update** (blue) and **Delete** (red) button
- Uses a Bootstrap breadcrumb nav for easy navigation to Register and Login

---

### `update.php` — Update User
- Fetches the existing user data by `id` (passed via GET parameter)
- Pre-fills the form with current name, email, and password
- On submit → validates and runs an `UPDATE` SQL query
- On success → redirects back to `view.PHP`

---

### `delete.php` — Delete User
- Receives the user `id` via GET parameter
- Runs a `DELETE` SQL query
- Shows a SweetAlert confirmation of success or failure
- Redirects back to `view.PHP`

---

## 🤝 Credits & Dependencies

- [Bootstrap 5.3.8](https://getbootstrap.com/) — UI framework
- [SweetAlert2 v11](https://sweetalert2.github.io/) — Beautiful alert dialogs
- [XAMPP](https://www.apachefriends.org/) — Local PHP + MySQL server

https://github.com/user-attachments/assets/2d77e3e3-d1f9-41e3-b0e8-842eec169dfc



