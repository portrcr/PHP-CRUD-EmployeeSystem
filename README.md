# Employee Management System

A lightweight, PHP and MySQL-based web application for managing company departments and employees.

---

## 🚀 Features

- **Dashboard**: Quick search and direct links to all management actions.
- **Department Management**:
  - Add new departments.
  - View and search current departments.
  - Remove existing departments.
- **Employee Management**:
  - Add new employees with contact details and department assignment.
  - View and search current employee records.
  - Modify existing employee information.
  - Remove employees by ID.
- **Clean Interface**: Responsive card-based layout with simple, organized CSS.

---

## 📁 Project Structure

```text
EmployeeSystem/
├── config/
│   └── db.php             # PDO database connection settings
├── css/
│   └── styles.css         # Basic styling for navigation, cards, and forms
├── includes/
│   ├── header.php         # Reusable navigation and HTML header
│   └── footer.php         # Reusable HTML footer
├── addDept.php            # Add department page
├── deptList.php           # List / search departments page
├── removeDept.php         # Remove department page
├── addEmployee.php        # Add employee page
├── editEmployee.php       # Edit employee page
├── employeeList.php       # List / search employees page
├── removeEmployee.php     # Remove employee page
├── index.php              # Main dashboard
└── README.md              # Project documentation
```

---

## 🗄️ Database Setup

Ensure MySQL is running (e.g., via XAMPP) and create the database and tables:

```sql
CREATE DATABASE IF NOT EXISTS employee_db;
USE employee_db;

-- Departments Table
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` INT(11) NOT NULL AUTO_INCREMENT,
  `department_name` VARCHAR(50) DEFAULT NULL UNIQUE,
  `creation_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`department_id`)
);

-- Employees Table
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` INT(11) NOT NULL AUTO_INCREMENT,
  `dept_id` INT(11) DEFAULT NULL,
  `firstname` VARCHAR(20) NOT NULL,
  `lastname` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(13) NOT NULL UNIQUE,
  `email` VARCHAR(20) NOT NULL UNIQUE,
  `employment_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`),
  CONSTRAINT `fk_employee_dept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`department_id`)
);
```

---

## ⚙️ Configuration

Database connection parameters are located in `config/db.php`:

```php
$host    = "localhost";
$dbname  = "employee_db";
$user    = "root";
$pass    = "";
$charset = "utf8mb4";
```

---

## 💻 Getting Started

1. Place the project folder into your web server root (e.g. `C:/xampp/htdocs/EmployeeSystem`).
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Open your browser and navigate to:
   ```
   http://localhost/EmployeeSystem/
   ```
