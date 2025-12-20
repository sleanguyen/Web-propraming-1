Student Forum & Q&A System

University of Greenwich - Web Programming 1 (COMP1841)

Project Overview

The Student Forum is a dynamic web-based Q&A platform designed to facilitate academic discussion and peer-to-peer learning. It allows students to post questions related to specific modules, share visual aids, and interact via comments and likes. The system includes a secure Administrative Backend for content moderation and user management.

Features

For Students (Public Area)

User Authentication: Secure Login & Registration with Split-Screen Interface.

Create Posts: Ask questions with text and image uploads.

Interact: Like posts and comment on discussions.

Profile Management: Update display name and view personal activity history.

Help & Support: Contact Admin directly via a secure email form.

For Administrators (Secure Area)

Role-Based Access Control (RBAC): Dedicated dashboard for Admins.

Content Moderation: Edit or Delete inappropriate questions and comments.

User Management: Update user details or delete accounts (Cascading delete).

Module Management: Add, Edit, or Delete academic modules.

Gamification: Award "Achievement Badges" to students via automated HTML Emails.

Technologies Used

Backend: PHP 8 (PDO - PHP Data Objects)

Database: MySQL / MariaDB (Relational Design)

Frontend: HTML5, CSS3 (Card-Based Layout, Flexbox)

Library: PHPMailer (SMTP Email Integration)

Server: XAMPP (Apache)

Installation & Setup

Database Setup:

Open phpMyAdmin.

Create a new database named cw.

Import the provided SQL file (or run the schema scripts found in the Appendix of the report).

Project Configuration:

Copy the project folder into your htdocs directory (e.g., C:\xampp\htdocs\COMP1841\Coursework).

Ensure the images/ folder exists and has write permissions.

Email Configuration (Important):

Open includes/MailService.php.

Update the $mail->Username with your Gmail address.

Update the $mail->Password with your Google App Password.

Run the Application:

Start Apache and MySQL in XAMPP control panel.

Access via browser: http://localhost/COMP1841/Coursework/

Default Credentials

Master Admin:

Email: sleanguyen@gmail.com

Password: secret

Test Student:

Email:bryantgmail.com

Password: 123

Folder Structure

/admin - Administrative controllers (Login, User Mgmt, Badge Awarding).

/includes - Database connection and MailService logic.

/templates - HTML views and layout files.

/images - User uploaded content.

/PHPMailer - External library for SMTP emails.

Security Measures

SQL Injection: Prevented using PDO Prepared Statements.

XSS: Prevented using htmlspecialchars() output sanitization.

CSRF/Session Hijacking: Session regeneration and strict access checks (Check.php).

Passwords: Hashed using password_hash() (bcrypt).

Developed by [Your Name] - [Your Student ID]
