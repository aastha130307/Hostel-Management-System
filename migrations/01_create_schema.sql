-- 01_create_schema.sql
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Payment;
DROP TABLE IF EXISTS MessBill;
DROP TABLE IF EXISTS Allocation;
DROP TABLE IF EXISTS Complaint;
DROP TABLE IF EXISTS Fine;
DROP TABLE IF EXISTS Room;
DROP TABLE IF EXISTS Student;
DROP TABLE IF EXISTS Users;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20) UNIQUE,
  username VARCHAR(100) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','student') NOT NULL DEFAULT 'student',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Student (
  rollno VARCHAR(20) PRIMARY KEY,
  fname VARCHAR(100) NOT NULL,
  lname VARCHAR(100),
  age INT,
  gender ENUM('M','F','O'),
  course VARCHAR(100),
  branch VARCHAR(100),
  contact VARCHAR(30),
  email VARCHAR(150),
  address TEXT,
  room_no VARCHAR(20),
  date_joined DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Room (
  room_no VARCHAR(20) PRIMARY KEY,
  capacity INT NOT NULL,
  status ENUM('Vacant','Occupied') DEFAULT 'Vacant',
  no_of_chairs INT DEFAULT 0,
  no_of_almirah INT DEFAULT 0,
  no_of_tables INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Allocation (
  allocation_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20),
  room_no VARCHAR(20),
  date_of_allocation DATE,
  date_of_vacating DATE,
  FOREIGN KEY (rollno) REFERENCES Student(rollno) ON DELETE CASCADE,
  FOREIGN KEY (room_no) REFERENCES Room(room_no) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE MessBill (
  billing_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20),
  amount DECIMAL(10,2),
  month_year VARCHAR(20),
  status ENUM('Paid','Pending') DEFAULT 'Pending',
  generated_on DATE,
  FOREIGN KEY (rollno) REFERENCES Student(rollno) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Payment (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20),
  amount DECIMAL(10,2),
  date_of_payment DATE,
  method VARCHAR(50),
  status ENUM('Success','Failed','Pending') DEFAULT 'Success',
  reference VARCHAR(100),
  FOREIGN KEY (rollno) REFERENCES Student(rollno) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Fine (
  fine_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20),
  violation TEXT,
  amount DECIMAL(10,2),
  status ENUM('Paid','Pending') DEFAULT 'Pending',
  imposed_on DATE,
  FOREIGN KEY (rollno) REFERENCES Student(rollno) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Complaint (
  complaint_id INT AUTO_INCREMENT PRIMARY KEY,
  rollno VARCHAR(20),
  description TEXT,
  category VARCHAR(100),
  date_submitted DATE,
  status ENUM('Pending','In Progress','Resolved') DEFAULT 'Pending',
  response TEXT,
  FOREIGN KEY (rollno) REFERENCES Student(rollno) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
