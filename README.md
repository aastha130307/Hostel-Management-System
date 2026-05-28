# 🏨 Vasudha Hostel Management System

A full-stack web-based Hostel Management System designed to automate and digitize hostel administration workflows. The system provides secure role-based access for admins and students while managing students, rooms, complaints, mess bills, fines, and payments using a structured MySQL database and PHP backend.

The project demonstrates real-world backend engineering concepts such as:

* Secure authentication system
* Session-based authorization
* Role-based access control
* REST-like PHP APIs
* PDO database architecture
* Full-stack CRUD operations
* Admin-level privilege enforcement

---

# 🚀 Features

## 🔐 Authentication System

* Secure login system (Admin & Student)
* Username or Roll Number login support
* Password hashing using `password_hash()`
* Secure verification using `password_verify()`
* Session-based authentication
* Role-based access control
* Secure logout system

---

## 🛡 Role-Based Access Control

* Admin-only APIs for sensitive operations
* Student-level restricted access
* Server-side session validation
* Protected backend endpoints

---

## ⚖️ Fine Management System

* Admin can impose fines on students
* Violation-based fine creation
* Amount validation and enforcement
* Secure insertion using prepared statements
* Status tracking (Pending / Paid)

---

## 🏗 Database Connection Layer

* Centralized PDO-based connection (`db.php`)
* Exception handling for DB errors
* UTF-8 encoding support
* Session initialization
* Secure prepared statement support

---

## 👨‍🎓 Student Management

* Add and manage student records
* View academic and personal details
* Role-based data visibility
* Dynamic student listing via API (JSON)

---

## 🏠 Room Management

* Room allocation system
* Capacity tracking
* Allocation history
* Occupancy status management

---

## 💰 Payment System

* Hostel payment recording
* Multiple payment methods (UPI, Cash, etc.)
* Auto-generated reference IDs
* Transaction status tracking
* Secure database insertion

---

## 📝 Complaint System

* Student complaint submission
* Category-based complaint handling
* Status tracking (Pending / In Progress / Resolved)
* Admin response system

---

## 🌐 Backend API System

* PHP REST-like API structure
* JSON-based responses
* Fetch API frontend integration
* Session-protected endpoints
* Secure prepared SQL queries

---

# 🧰 Tech Stack

## Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript (Fetch API)

## Backend

* PHP (PDO-based architecture)

## Database

* MySQL

## Tools

* XAMPP / Apache Server
* Git & GitHub

---

# 🗄 Database Schema

## Core Tables

* Users
* Student
* Room
* Allocation
* MessBill
* Payment
* Fine
* Complaint

## Database Design Features

* Primary & Foreign Keys
* Cascading Deletes
* ENUM-based status management
* Fully normalized relational structure
* UTF8MB4 encoding support

---

# 🔐 Security Features

* PDO prepared statements (SQL Injection protection)
* Password hashing (`password_hash`)
* Secure authentication system
* Session-based login/logout flow
* Role-based authorization (Admin / Student)
* Admin-only API protection
* Input validation for financial operations
* Protected backend endpoints

---

# 🔄 System Workflow

1. Database connection initialized via `db.php`
2. Admin creates account securely
3. User logs in (Admin / Student)
4. Credentials validated using PDO
5. Session is created and stored
6. Role-based access is enforced
7. Admin performs privileged actions (fines, management)
8. Students interact with system (complaints, viewing data)
9. Data is exchanged via JSON APIs
10. User logs out and session is destroyed

---

# ⚙️ Installation & Setup

## 1. Clone Repository

```bash id="clone4"
git clone <repository-link>
```

## 2. Create Database

```sql id="db4"
CREATE DATABASE vasudha_hostel;
```

## 3. Import Schema

```bash id="schema4"
mysql -u root -p vasudha_hostel < migrations/01_create_schema.sql
```

## 4. Seed Data (Optional)

```bash id="seed4"
mysql -u root -p vasudha_hostel < seed/seed_data.sql
```

## 5. Configure Database

Update credentials in:

```php id="dbconfig4"
db.php
```

## 6. Run Project

Place project inside `htdocs` and start Apache + MySQL using XAMPP.

---

# 📌 Project Highlights

* Full-stack CRUD web application
* Secure authentication & session system
* Role-based access control (Admin vs Student)
* PDO-based database architecture
* Real-time API-based frontend updates
* Financial transaction handling module
* Admin-only operations (fines, control actions)
* Real-world hostel workflow simulation
* Production-style backend structure

---

# 🚀 Future Enhancements

* Online payment gateway integration
* Hostel attendance system
* Email/SMS notifications
* Advanced analytics dashboard
* Mobile-responsive UI
* Separate dashboards for Admin and Students

---

# 📚 Learning Outcomes

This project demonstrates:

* Full-stack web development
* Secure backend engineering in PHP
* MySQL relational database design
* Session management & authentication
* Role-based access control systems
* API development with JSON
* Real-world system architecture design
* Secure coding practices (production-style mindset)

---

# 👨‍💻 Author

Developed as a Full Stack + DBMS project to demonstrate real-world hostel management system architecture, secure backend development, and production-level database-driven application design.

