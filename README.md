# PHP Library Index Project

## Author 
Kuriakos Antoniadis 3rd Year student at RAU ro, kuriakosant2003@gmail.com
this application is a project for the 'Advanced Web Programming' class 

## Description
The PHP Library Index project is a web application that allows users to manage a collection of books efficiently. Users can add books with comprehensive details and an optional cover image. This project utilizes PHP and MySQL and is designed to be run on a local server using XAMPP.

## Features
- **Add Books**: Users can add new books with details such as title, author, category, publisher, price, and an optional cover image.
- **List Books**: Display all added books with options to view or remove them.
- **Responsive Design**: The application is fully responsive and user-friendly.

## Prerequisites
To run this project, you will need:
- XAMPP (includes Apache, MySQL, PHP)
- A modern web browser
( make sure these are all added to your PATH system variable)

## Installation Guide

### Clone the Repository
Clone the project repository from GitHub to your local machine:

In cmd or powershell:
git clone https://github.com/yourusername/library-index.git

### XAMPP Setup 

Move the cloned project into the htdocs directory of your XAMPP installation: mv library-index /path/to/xampp/htdocs/
Launch XAMPP Control Panel.
Start the Apache and MySQL services.

### Database Setup 

Open phpMyAdmin at http://localhost/phpmyadmin/ in your browser.
Create a new database named library_db.
upload the library_db.sql file from the project directory.

### DB CONFIGURATION

Configure the database connection in the db.php file as necessary 

### Running the application 

Access the project in your web browser:
http://localhost/library-index/

### Troubleshooting
Connection Errors: Ensure MySQL service is running and check database credentials in db.php.
Image Not Displaying: Verify the image file is placed in the correct directory and referenced correctly in the application.

### License
This project is licensed under the MIT License.

### Acknowledgments
OpenAI ChatGPT for assistance in code and documentation.
XAMPP for providing a local development environment.
phpMyAdmin for database management.

