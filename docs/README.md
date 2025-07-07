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
CREATE DATABASE eprofile_db;
```

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

> 💡 We use `password_hash()` in PHP for more secure password handling.

---

## 🏠 Step 3: Create `residents` Table in `eprofile_db`

This table stores the full profile data for residents.

```sql
USE eprofile_db;

CREATE TABLE residents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    middle_name VARCHAR(100),
    last_name VARCHAR(100),
    suffix VARCHAR(20),
    gender VARCHAR(10),
    birthday DATE,
    birthplace VARCHAR(255),
    civil_status VARCHAR(50),
    citizen VARCHAR(100),
    religion VARCHAR(100),
    height_cm VARCHAR(10),
    weight_kg VARCHAR(10),
    mother_name VARCHAR(255),
    father_name VARCHAR(255),
    is_voter VARCHAR(10),
    is_beneficiary VARCHAR(10),
    categories TEXT,
    barangay VARCHAR(100),
    street VARCHAR(255),
    contact_number VARCHAR(20),
    email VARCHAR(100),
    picture VARCHAR(255),
    qr_path VARCHAR(255),
    is_deleted BOOLEAN DEFAULT 0
);
```

---

## 🧪 Step 4: Insert Sample Data (Optional)

### Sample Admin User

```sql
USE eprofile_db;

INSERT INTO users (username, password, role)
VALUES ('admin', password_hash('admin123'), 'user');
```

---

## ✅ You're Done!

- Login logic should use the `users` table from `eprofile_db`.
- Resident profile data should be saved in the `residents` table under `eprofile_db`.
