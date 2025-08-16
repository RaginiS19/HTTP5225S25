# Student & Course CRUD Application with Relationships

A Laravel application demonstrating complete CRUD functionality for **Students**, **Courses**, and **Professors** with advanced relationships, Bootstrap styling, and error handling.

## Features

### Students
- Full Create, Read, Update, Delete (CRUD) functionality
- **Many-to-Many relationship** with Courses
- Course selection when creating/editing students
- Validation with custom error messages:
  - `fname` (First Name) – required
  - `lname` (Last Name) – required
  - `email` – optional, must be a valid email format
  - `course_ids` – optional, array of valid course IDs
- Error handling using `try/catch` for database operations
- Bootstrap-styled forms and tables
- Pagination with Bootstrap styling

### Courses
- Full CRUD functionality
- **One-to-One relationship** with Professors
- **Many-to-Many relationship** with Students
- Professor assignment when creating/editing courses
- Validation rules:
  - `name` – required
  - `description` – optional
  - `professor_id` – optional, must exist in professors table
- Error handling with `try/catch`
- Bootstrap-styled forms, tables, and buttons
- Pagination with Bootstrap styling

### Professors
- Full CRUD functionality
- **One-to-One relationship** with Courses
- Validation rules:
  - `name` – required
- Error handling with `try/catch`
- Bootstrap-styled forms and tables
- Pagination with Bootstrap styling

## Database Relationships

### Many-to-Many: Students ↔ Courses
- Students can enroll in multiple courses
- Courses can have multiple students
- Implemented using pivot table `course_student`
- Course selection available when creating/editing students

### One-to-One: Professor ↔ Course
- Each professor can teach one course
- Each course can have one professor
- Implemented using foreign key `professor_id` in courses table
- Professor assignment available when creating/editing courses

## Technology Stack
- Laravel 10.x
- PHP 8.x
- MySQL
- Bootstrap 5

## Installation

1. **Clone the repository**
   ```bash
   git clone <repo-url>
   cd <project-folder>
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - Update `.env` file with your database credentials
   - Create the database

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open your browser and go to `http://localhost:8000`
   - Navigate to Students, Courses, or Professors sections

## Sample Data

The seeder creates:
- 5 Professors with different names
- 5 Courses with descriptions and assigned professors
- 5 Students with email addresses
- Random course enrollments for students

## Usage

### Managing Students
- View all students with their enrolled courses
- Create new students and select courses during creation
- Edit existing students and modify course enrollments
- Delete students (soft delete)

### Managing Courses
- View all courses with assigned professors and student counts
- Create new courses and assign professors
- Edit existing courses and change professor assignments
- Delete courses

### Managing Professors
- View all professors with their assigned courses
- Create new professors
- Edit existing professors
- Delete professors

## Database Schema

### Students Table
- `id` (Primary Key)
- `fname` (First Name)
- `lname` (Last Name)
- `email` (Unique)
- `created_at`, `updated_at`, `deleted_at`

### Courses Table
- `id` (Primary Key)
- `name`
- `description`
- `professor_id` (Foreign Key to professors)
- `created_at`, `updated_at`

### Professors Table
- `id` (Primary Key)
- `name`
- `created_at`, `updated_at`

### Course_Student Table (Pivot)
- `id` (Primary Key)
- `course_id` (Foreign Key to courses)
- `student_id` (Foreign Key to students)
- `created_at`, `updated_at`

## Screenshots

Please include screenshots of all pages in your GitHub repository for grading purposes.
