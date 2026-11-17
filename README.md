# LanetHack – Secure Session Authentication Web Application

- LanetHack is a security-focused web application demonstrating robust user authentication, secure session management, and backend database validation. Designed with a modern, dark cyber-themed user interface, the project applies foundational cybersecurity principles to protect user accounts and prevent unauthorized access.

## Key Features
- Secure Session Management: Implements server-side PHP session handling to authenticate users, maintain active states, and securely terminate sessions upon logout.
- Database Validation: Uses structured MySQL queries to verify user credentials and safeguard account records.
- Responsive Cyber UI: Built with Bootstrap 5 for seamless compatibility across desktop and mobile screens.

## Tech Stack
- Backend: PHP
- Database: MySQL
- Frontend: HTML5, CSS3, Bootstrap 5

## Setup & Local Installation
1. Clone this repository into your local server directory (e.g., `htdocs` in XAMPP or `www` in WAMP):
   ```bash
   git clone https://github.com
   ```
2. Start 'Apache' and 'MySQL' from your local server control panel.
3. Open 'phpMyAdmin', create a new database, and import the provided `.sql` schema file.
4. Update the database connection credentials in the configuration file (`config.php` or `db.php`).
5. Launch your browser and navigate to `http://localhost/LanetHack`.
