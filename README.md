# Tourist Management System

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)
![AngularJS](https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=flat&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat&logo=mysql&logoColor=white)

A web-based full-stack project built using HTML5, CSS3, JavaScript, jQuery then migrated to AngularJS, Bootstrap, PHP, and SQL. This is the first full-stack application I built and hosted, aiming to provide insightful descriptions and previews of places featuring Intramuros. The application also includes CRUD operations to manage a fictional booking system.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Setup](#setup)
- [Creating an Admin](#creating-an-admin)
- [Exploring the Application](#exploring-the-application)
- [Contributing](#contributing)
- [License](#license)

## Features

- User authentication with admin capabilities
- Responsive design using Bootstrap
- Dynamic content management
- SQL database interactions

## Technologies Used

- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript
  - jQuery (previous version)
  - AngularJS
  - Bootstrap

- **Backend:**
  - PHP
  - SQL (MySQL)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/tourist-management-system.git
   ```

2. Navigate to the project directory:

   ```bash
   cd tourist-management-system
   ```

3. Ensure you have [XAMPP](https://www.apachefriends.org/index.html) or any service that includes PHPMyAdmin or another database management system installed.

## Setup

1. **Import the Database:**
   - Locate the SQL files in the `database` folder.
   - Open PHPMyAdmin and create a new database.
   - Import the SQL files from the `database` folder to create the required tables.

2. **Start the Server:**
   - Navigate to the directory where `index.php` is located.
   - Start the server using XAMPP:
     - Open XAMPP Control Panel.
     - Start the **Apache** server.
   - Alternatively, you can use the Live Server extension in Visual Studio Code to run the application locally.

## Creating an Admin

To create an admin user:

1. Open your database management tool (e.g., PHPMyAdmin).
2. Manually insert an entry into the `login` table with the following command:

   ```sql
   INSERT INTO login (username, password, role) VALUES ('admin_username', 'admin_password', 'admin');
   ```

   Make sure to replace `admin_username` and `admin_password` with your desired credentials.

## Exploring the Application

Once the server is running and the admin is created, you can access the application via:

```
http://localhost/path/to/tourist-management-system/index.php
```

Feel free to explore the various features and functionalities of the application.

## Contributing

Contributions are welcome! Please create a pull request or open an issue to discuss your ideas.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Contact

For any questions or feedback, feel free to reach out:

- **Email**: lanceorville5@gmail.com
- **GitHub**: [lancedalanon](https://github.com/lancedalanon)

