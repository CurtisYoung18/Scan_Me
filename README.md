# MenuScan - Restaurant Menu Management System

A modern web-based restaurant menu management system built with CodeIgniter 4, featuring QR code menu scanning, real-time order management, and Google authentication.

## Features

- 🍽️ Digital menu management
- 📱 QR code generation for tables
- 🛍️ Real-time order management
- 👥 User management with Google authentication
- 📊 Order tracking and analytics
- 🎨 Modern, responsive UI

## Prerequisites

- PHP >= 8.1
- MySQL/MariaDB
- Composer
- Web server (Apache/Nginx) or PHP's built-in server
- Google Cloud Platform account (for OAuth)

## Quick Start

1. **Clone the repository**
```bash
git clone https://github.com/CurtisYoung18/Scan_Me.git
cd Scan_Me
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment Setup**
```bash
# Copy the environment file
cp env .env

# Generate encryption key
php spark key:generate
```

4. **Configure Environment**
Edit `.env` file and set:
- Database credentials
- Google OAuth credentials
- Base URL
- Other environment-specific settings

5. **Database Setup**
```bash
# Create database
mysql -u root -p
CREATE DATABASE menuscan;
exit;

# Import database schema (if available)
mysql -u root -p menuscan < database/schema.sql
```

6. **Set Permissions**
```bash
chmod -R 777 writable/
```

7. **Start Development Server**
```bash
php spark serve
```

Visit `http://localhost:8080` in your browser

## Google OAuth Setup

1. Go to [Google Cloud Console](https://console.cloud.google.com)
2. Create a new project
3. Enable Google+ API
4. Create OAuth 2.0 credentials
5. Add authorized redirect URI: `http://localhost:8080/login/callback`
6. Copy credentials to `.env`:
```
google.client_id = 'your-client-id'
google.client_secret = 'your-client-secret'
google.redirect_uri = 'http://localhost:8080/login/callback'
```

## Project Structure

```
Scan_Me/
├── app/                    # Application code
│   ├── Config/            # Configuration files
│   ├── Controllers/       # Controller classes
│   ├── Models/           # Model classes
│   └── Views/            # View templates
├── public/                # Web server document root
│   ├── index.php         # Front controller
│   └── assets/           # Static assets
├── system/               # CodeIgniter 4 framework
├── writable/            # Runtime files
├── .env.example         # Environment template
├── composer.json        # Dependencies
└── README.md           # This file
```

## Security Notes

- Never commit `.env` file
- Keep encryption key secure
- Protect Google OAuth credentials
- Regular security updates

## Troubleshooting

1. **Database Connection Issues**
   - Verify database credentials in `.env`
   - Ensure MySQL service is running
   - Check database permissions

2. **Google Login Not Working**
   - Verify OAuth credentials
   - Check redirect URI configuration
   - Ensure Google+ API is enabled

3. **Permission Issues**
   - Ensure `writable` directory is writable
   - Check file ownership
   - Verify PHP has required extensions

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, please open an issue in the GitHub repository.
