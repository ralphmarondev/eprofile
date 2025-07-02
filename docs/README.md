# MySQL Database Setup for Resident Management System

This guide will walk you through setting up the necessary MySQL databases and tables for the Resident Management System using **XAMPP** or any other MySQL-compatible server.

---

## 📦 Requirements

- MySQL Server (XAMPP recommended for Windows)
- phpMyAdmin or MySQL CLI
- Basic knowledge of SQL

---

## 🛠️ Step 1: Create the Databases

```sql
CREATE DATABASE login_system;
CREATE DATABASE residents_db;
````

---

## 👤 Step 2: Create `users` Table in `eprofile_db`

This table is used for login authentication.

```sql
USE eprofile_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(100) NOT NULL
);
```

> 💡 You can use `MD5()` for now or switch to `password_hash()` in PHP for more secure password handling.

---

## 🏠 Step 3: Create `residents` Table in `residents_db`

This table stores the full profile data for residents.

```sql
USE residents_db;

CREATE TABLE residents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    middle_name VARCHAR(100),
    last_name VARCHAR(100),
    suffix VARCHAR(20),
    gender VARCHAR(10),
    birthday DATE,
    b_place VARCHAR(255),
    civil_status VARCHAR(50),
    citizen VARCHAR(100),
    religion VARCHAR(100),
    height VARCHAR(10),
    weight VARCHAR(10),
    motherName VARCHAR(255),
    fatherName VARCHAR(255),
    voter VARCHAR(10),
    beneficiary VARCHAR(10),
    categories TEXT,
    barangay VARCHAR(100),
    street VARCHAR(255),
    contact_number VARCHAR(20),
    email VARCHAR(100),
    picture VARCHAR(255)
);
```

---

## 🧪 Step 4: Insert Sample Data (Optional)

### Sample Admin User

```sql
USE login_system;

INSERT INTO users (username, password)
VALUES ('admin', MD5('admin123'));
```

---

## ✅ You're Done!

* Login logic should use the `users` table from `login_system`.
* Resident profile data should be saved in the `residents` table under `residents_db`.
