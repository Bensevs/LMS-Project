🎓 LMS Backend
A simple and modular Learning Management System (LMS) Backend built with PHP and MySQL.

🚀 Features
RESTful API with simple query routing

User authentication (JWT Ready)

Course listing & enrollment management

Modular code structure (controllers, config, helpers)

🛠 Technologies
PHP 7+

MySQL

JWT (optional)

Apache / XAMPP / MAMP

⚙️ Setup
Clone the repository:

bash
Copy
Edit
git clone https://github.com/Bensevs/LMS-Project.git
Place the backend in your local server (e.g., C:/xampp/htdocs/backend).

Import the provided lms.sql database into MySQL.

Update /config/db.php with your database credentials.

📡 Example API Endpoints
Endpoint	Method	Description
/index.php?q=login	GET	Login with email & password
/index.php?q=courses	GET	Get all courses
/index.php?q=course&id=1	GET	Get course by ID

