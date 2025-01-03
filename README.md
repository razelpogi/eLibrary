# eLibrary

eLibrary is a web-based digital library management system created to streamline the process of organizing, searching, and borrowing books and other resources. Designed for schools, organizations, and individual users, eLibrary provides an efficient and user-friendly platform for managing libraries.

![eLibrary Banner]()



---

## Overview

The eLibrary system allows administrators to efficiently manage library records, generate reports, and oversee borrowing activities, while providing end users with intuitive search functionality and easy access to library collections.

---

## Key Features

- **Book Catalog Management**: Add, edit, and delete book records.
- **Advanced Search**: Find books using keywords, titles, authors, or genres.
- **Borrowing System**: Monitor borrowed books, due dates, and return status.
- **User Authentication**: Secure login for both administrators and library users with role-based permissions.
- **Responsive Design**: Fully optimized for desktops, tablets, and mobile devices.
- **Report Generation**: Create and export usage reports for library management insights.

---

## Technology Stack

- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Dependency Management**: Composer
- **Web Server**: Apache (XAMPP, WAMP, or Laragon compatible)

---

## Installation Guide

Follow these instructions to install and configure eLibrary on your local server:

### Prerequisites

- Local server environment (e.g., XAMPP, WAMP, or Laragon).
- MySQL database server.
- Composer (for PHP dependency management).

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/razelpogi/eLibrary.git
   ```

2. **Navigate to the Project Directory**:
   ```bash
   cd eLibrary
   ```

3. **Install Required Dependencies**:
   ```bash
   composer install
   ```

4. **Configure the Database**:
   - Import the provided `eLibrary.sql` file into your MySQL database.
   - Update the database credentials in the `.env` or configuration file.

5. **Run the Application**:
   - Start your local server.
   - Access the application in your browser at `http://localhost/eLibrary`.

---

## How to Use

### For Administrators

- Log in with admin credentials.
- Manage books, categories, and users via the Admin Dashboard.
- Generate reports to track library usage and activities.

### For Library Users

- Create an account or log in.
- Search for available books and view detailed information.
- Borrow books and check borrowing history.

---

## Screenshots

### Home Page
![Home Page]()

### Admin Dashboard
![Admin Dashboard](img/Screenshot%202024-12-18%20205508.png)

### Search Interface
![Search Interface]()


## Contact

If you have any questions, suggestions, or need assistance, feel free to contact:

**Razel Pogi**  
Email: camonirazel01@gmail.com

---

Thank you for using eLibrary!
