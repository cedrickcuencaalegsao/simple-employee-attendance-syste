
# Simple Employee Attendance System

This is a Laravel-based web application for managing employee attendance, including time-in/time-out, password recovery via OTP, and admin management features.

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL (or compatible database)

## Setup Instructions

### 1. Clone the Repository

```bash
git clone <your-repo-url>
cd simple-employee-attendance-syste
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the example environment file and update your database/mail settings:

```bash
cp .env.example .env
```
Edit `.env` and set your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attendance
DB_USERNAME=root
DB_PASSWORD=your_password
```


#### Mailtrap Setup (for email testing)

To use Mailtrap for email testing, sign up at [mailtrap.io](https://mailtrap.io/) and get your SMTP credentials. Then update your `.env` file:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="Attendance System"
```

Replace `your_mailtrap_username` and `your_mailtrap_password` with your Mailtrap credentials.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

### 7. Build Frontend Assets

```bash
npm run build
```
For development, use:
```bash
npm run dev
```

### 8. Start the Application

```bash
php artisan serve
```
Visit [http://localhost:8000](http://localhost:8000) in your browser.

### 9. Running Tests

```bash
php artisan test
```

## Features

- Employee time-in/time-out
- Admin dashboard for employee management
- OTP-based password recovery
- Attendance tracking
- Responsive UI (Tailwind CSS + Vite)

## Project Structure

- `app/Http/Controllers/` - Main controllers (Admin, Attendance, Auth, OTP)
- `app/Models/` - Eloquent models (User, Attendance)
- `resources/views/` - Blade templates (login, dashboard, attendance, etc.)
- `database/migrations/` - Migration files for database tables
- `database/seeders/` - Seeders for initial data
- `public/` - Entry point and public assets
- `routes/web.php` - Web routes

## Additional Notes

- Make sure your database is running and accessible.
- For email/OTP features, configure mail settings in `.env`.
- For development, you can use the provided scripts in `composer.json` and `package.json`.

## License

This project is open-sourced under the MIT license.
