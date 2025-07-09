# Laravel Authentication & Profile Management System

A full-stack authentication system with user profile CRUD functionality built with Laravel, featuring both web interface and RESTful API endpoints.

## Features

### ✅ Authentication Module
- **Email/Password Registration & Login** - Secure user registration and authentication
- **Laravel Sanctum API Authentication** - Token-based authentication for API access
- **Password Encryption** - Bcrypt hashing (Laravel's default)
- **Rate Limiting** - Brute-force protection (6 requests per minute for auth endpoints)
- **Post-login Redirect** - Automatic redirect to dashboard after successful login

### ✅ User Profile CRUD
- **Profile Fields**: name, email, phone, bio, avatar (image URL), role
- **API Endpoints**:
  - Create user profiles (admin only)
  - Read profiles (single + list with pagination)
  - Update profiles (users can update own, admins can update any)
  - Delete profiles (admin only)
- **Role-based Access Control** - Admin vs regular user permissions

### ✅ Rapid Development Tools
- **Laravel Breeze** - Rapid authentication scaffolding
- **Laravel Sanctum** - API token authentication
- **AI Integration** - Code generation and refactoring assistance
- **Modern UI** - Tailwind CSS with responsive design

## Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: SQLite (default), supports MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum for API tokens
- **UI Framework**: Laravel Breeze with Alpine.js

## Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM (for frontend assets)

### 1. Clone the Repository
```bash
git clone <repository-url>
cd your-project-name
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration
Edit `.env` file and configure your database:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Or for MySQL/PostgreSQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Build Frontend Assets
```bash
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Usage

### Web Interface
1. **Register**: Visit `/register` to create a new account
2. **Login**: Visit `/login` to authenticate
3. **Dashboard**: After login, you'll be redirected to `/dashboard`
4. **Profile**: Visit `/profile` to view your profile details

### API Usage
The application provides a complete RESTful API for user management. See [API_DOCUMENTATION.md](API_DOCUMENTATION.md) for detailed endpoint documentation.

#### Quick API Examples:

**Register a new user:**
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone": "+1234567890",
    "bio": "Software developer"
  }'
```

**Login and get token:**
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'
```

**Get user profile (with token):**
```bash
curl -X GET http://localhost:8000/api/profile/me \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── AuthController.php      # API authentication
│   │   │   │   └── ProfileController.php   # API profile CRUD
│   │   │   └── DashboardController.php     # Web dashboard
│   │   ├── Requests/
│   │   │   └── Api/                        # Form validation
│   │   └── Middleware/                     # Custom middleware
│   └── Models/
│       └── User.php                        # User model with Sanctum
├── database/
│   └── migrations/                         # Database migrations
├── resources/
│   └── views/
│       ├── dashboard.blade.php             # Dashboard view
│       ├── profile.blade.php               # Profile view
│       └── auth/                           # Authentication views
├── routes/
│   ├── api.php                            # API routes
│   └── web.php                            # Web routes
└── API_DOCUMENTATION.md                   # Complete API docs
```

## Security Features

- **Password Hashing**: Bcrypt encryption
- **Rate Limiting**: Prevents brute-force attacks
- **CSRF Protection**: Built-in Laravel CSRF protection
- **Input Validation**: Comprehensive form request validation
- **Role-based Authorization**: Admin vs user permissions
- **Token-based Authentication**: Secure API access with Sanctum

## API Endpoints Summary

### Authentication
- `POST /api/register` - Register new user
- `POST /api/login` - Login user
- `POST /api/logout` - Logout user
- `GET /api/user` - Get current user

### Profile Management
- `GET /api/profile/me` - Get own profile
- `GET /api/profiles` - List all profiles (admin)
- `GET /api/profiles/{id}` - Get specific profile
- `POST /api/profiles` - Create user (admin)
- `PUT /api/profiles/{id}` - Update profile
- `DELETE /api/profiles/{id}` - Delete profile (admin)

## Development Notes

### Tools Used and Why
- **Laravel Breeze**: Rapid authentication scaffolding with modern UI components
- **Laravel Sanctum**: Lightweight API token authentication, perfect for SPA and mobile apps
- **AI Code Generation**: Used for rapid development and code refactoring
- **Tailwind CSS**: Utility-first CSS framework for rapid UI development

### Performance Optimizations
- **Database Indexing**: Proper indexes on email and role fields
- **Eager Loading**: Optimized database queries to prevent N+1 problems
- **Rate Limiting**: Prevents abuse and improves security
- **Caching**: Laravel's built-in caching mechanisms
- **Pagination**: Efficient data loading for large datasets

## Testing

Run the test suite:
```bash
php artisan test
```

## Deployment

### For Production
1. Set `APP_ENV=production` in `.env`
2. Configure your production database
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Set up proper web server (Apache/Nginx)

### Docker (Optional)
```bash
# Build and run with Docker
docker build -t laravel-auth-app .
docker run -p 8000:8000 laravel-auth-app
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, please open an issue in the GitHub repository or contact the development team.
