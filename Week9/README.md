# Student & Course CRUD Application

A Laravel application demonstrating complete CRUD functionality for **Students** and **Courses**, with additional **Professors seeding**, Bootstrap styling, and error handling.

## Features

### Students
- Full Create, Read, Update, Delete (CRUD) functionality
- Validation with custom error messages:
  - `fname` (First Name) – required
  - `lname` (Last Name) – required
  - `email` – optional, must be a valid email format
- Error handling using `try/catch` for database operations
- Bootstrap-styled forms and tables
- Pagination with Bootstrap styling

### Courses
- Full CRUD functionality
- Validation rules:
  - `name` – required
  - `description` – optional
- Error handling with `try/catch`
- Bootstrap-styled forms, tables, and buttons
- Pagination with Bootstrap styling

### Professors
- Migration for `professors` table with:
  - `id`
  - `name`
  - timestamps
- Factory to generate fake names
- Seeder to insert 10 fake professors into the database

---

## Technology Stack
- Laravel 10.x
- PHP 8.x
- MySQL
- Bootstrap 5

---

## Installation

1. **Clone the repository**
   ```bash
   git clone <repo-url>
   cd <project-folder>
