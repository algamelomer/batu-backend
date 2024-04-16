## University Management System - Backend

Welcome to the first version of the University Management System backend! This backend is designed to manage various aspects of university-related entities. Below is an overview of the key features and entities included in this version.

### Entities

1. **StudyPlan:**
   - Manages academic study plans for different stages. Provides details about courses and their information.

2. **StudentProjects:**
   - Handles information related to student projects, showcasing details about various projects.

3. **FacultyMember:**
   - Presents information about faculty members, offering insights into the teaching staff.

4. **Faculty:**
   - Contains details about different faculties, representing academic departments within the university.

5. **Department:**
   - Manages information about university departments, providing a description for each department.

6. **Post:**
   - Used for displaying datasets, articles, and news on the platform.

7. **Job:**
   - Enables users to apply for job positions.


### Getting Started

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Ziad-Abaza/BATU-LARAVEL-VUE.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd BATU-LARAVEL-VUE/back-end
   ```

3. **Install dependencies:**

   ```bash
   composer install
   ```

4. **Copy the .env file:**

   ```bash
   cp .env.example .env
   ```

5. **Generate an application key:**

   ```bash
   php artisan key:generate
   ```

6. **Configure the database:**

   - Open the `.env` file and update the database connection settings.

     ```dotenv
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=backend
     DB_USERNAME=root
     DB_PASSWORD=
     ```

     Replace `your_database_username` and `your_database_password` with your actual database username and password.

   - Save the changes to the `.env` file.

7. **Run migrations and seed the database:**

   ```bash
   php artisan migrate --seed
   ```

8. **Start the development server:**

   ```bash
   php artisan serve
   ```

   The API will be accessible at `http://127.0.0.1:8000`.

   Note for comparison file:

Whenever an update is made to the database files, the following steps must be taken each time:
1. Update the database files by running the command:
   ```
   php artisan mi:f
   ```

2. Secondly, perform the seeding of dummy data:
   ```
   php artisan db:seed
   ```


### API Routes

Explore the API routes for different entities:

- **StudyPlan:** `/api/study-plans`
- **StudentProjects:** `/api/student-projects`
- **FacultyMembers:** `/api/faculty-members`
- **Faculties:** `/api/faculties`
- **Departments:** `/api/departments`
- **Posts:** `/api/posts`
- **Jobs:** `/api/jobs`

### Contributions

Contributions are welcome! If you find issues or have suggestions, please open an issue or create a pull request.

Feel free to reach out if you encounter any difficulties or have further questions. Happy coding! 🚀
