# JDIH CMS - Biro Hukum Provinsi Bali

> **Sistem Informasi Jaringan Dokumentasi dan Informasi Hukum**

A comprehensive JDIH (Legal Documentation and Information Network) Content Management System built with **Laravel 12**, **Filament 4**, and modern web technologies. This system is designed for managing legal documents, regulations, and legal information for government institutions.

![Laravel 12](https://img.shields.io/badge/Laravel-12.x-red.svg)
![Filament](https://img.shields.io/badge/Filament-4.x-f59e0b.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)
![Vite](https://img.shields.io/badge/Vite-5.x-646CFF.svg)

## ✨ Features

### Public Interface
- **Legal Document Management**: Laws, regulations, monographs, articles, and court decisions
- **Advanced Search & Filtering**: Multi-criteria search with faceted navigation
- **Document Categorization**: Comprehensive taxonomy and classification system
- **PDF Viewer Integration**: Adobe PDF Embed API for document preview
- **QR Code Generation**: Easy document sharing with QR codes
- **Export Capabilities**: Excel and PDF export functionality
- **API Integration**: RESTful API for external system integration
- **Responsive Design**: Mobile-friendly interface
- **Multi-language Support**: Indonesian and English localization

### Admin Interface
- **Modern Admin Panel**: Powered by Filament 4 with elegant UI/UX
- **User Management**: Role-based access control with comprehensive user profiles
- **Content Management**: Intuitive CRUD operations for all legal documents
- **Analytics & Reporting**: Visitor tracking and download statistics
- **Form Builder**: Dynamic forms with validation and file uploads
- **Dashboard Widgets**: Real-time statistics and system overview
- **Advanced Tables**: Sortable, filterable, and searchable data tables
- **Bulk Actions**: Efficient batch operations on multiple records

## 🚀 Technology Stack

### Backend
- **Laravel 12.x** - Latest PHP framework with modern features
- **PHP 8.2+** - Latest PHP with improved performance
- **MySQL 8.0+** - Robust database management
- **Laravel Sanctum 4.0** - API authentication
- **Laravel Fortify 1.30** - Frontend authentication scaffolding

### Admin Panel
- **Filament 4.x** - Modern admin panel with beautiful interface
- **TALL Stack Integration** - Tailwind, Alpine.js, Laravel, and Livewire
- **Form Builder** - Dynamic forms with validation and components
- **Table Builder** - Advanced data tables with filtering and sorting
- **Dashboard Widgets** - Real-time analytics and system monitoring
- **Resource Management** - Intuitive CRUD operations

### Frontend
- **Vite 5.x** - Next generation frontend tooling
- **Bootstrap 5** - Modern CSS framework
- **Limitless Template** - Professional admin template
- **Adobe PDF Embed API** - Document viewer integration

### High Performance
- **Laravel Octane** - Supercharged application server
- **FrankenPHP** - Modern PHP application server with HTTP/2 and HTTP/3 support
- **Worker-based Architecture** - Persistent application instances for maximum performance
- **Built-in Load Balancing** - Automatic request distribution across workers

### Key Libraries
- **Intervention Image 3.0** - Modern image processing
- **Endroid QR Code 5.0** - QR code generation
- **Maatwebsite Excel 3.1** - Excel import/export
- **DomPDF 3.0** - PDF generation
- **Laravel Agent** - Device and browser detection

## 📋 Requirements

- **PHP 8.2** or higher
- **Composer 2.x**
- **Node.js 18+** and **npm 9+**
- **MySQL 8.0** or **MariaDB 10.4+**
- **Apache/Nginx** web server (optional with FrankenPHP)
- **FrankenPHP** - For high-performance deployment (automatically installed)

## 🛠 Installation

### 1. Clone Repository
```bash
git clone https://github.com/adiwp/jdih-bali.git jdih-cms
cd jdih-cms
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install frontend dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
Create a MySQL database and update your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jdih-cms
DB_USERNAME=root
DB_PASSWORD=your_password
```

Run migrations and seeders:
```bash
php artisan migrate
php artisan db:seed
```

### 5. Storage Setup
```bash
php artisan storage:link
```

### 6. Frontend Assets
```bash
npm run build
# or for development
npm run dev
```

### 7. Start Development Server

#### Option A: Traditional Laravel Development Server
```bash
php artisan serve
```

#### Option B: High-Performance Server with Laravel Octane + FrankenPHP
```bash
# Start Octane server
php artisan octane:start

# Or using the convenience script
./octane.sh start

# Start with file watching (auto-restart on changes)
./octane.sh start-watch
```

**Performance Comparison:**
- Traditional server: ~50-100 requests/second
- Octane + FrankenPHP: ~1,000+ requests/second with persistent state

Visit http://localhost:8000 for the public interface and http://localhost:8000/admin for the admin panel.

### 8. Admin Access
Login to the Filament admin panel with:
- **URL:** http://localhost:8000/admin
- **Email:** adi@univpancasila.ac.id
- **Password:** rahasia

## 🔧 Configuration

### Environment Variables
Key environment variables to configure:

```env
APP_NAME="JDIH CMS"
APP_URL=http://localhost:8000
APP_VERSION=v2.0.0

# Adobe PDF Embed API (optional)
ADOBE_EMBED_API_KEY=your_api_key

# Application Settings
LEGISLATION_PER_PAGE=25
MAX_UPLOAD_SIZE=10240
ALLOWED_FILE_TYPES=pdf,doc,docx,jpg,jpeg,png

# Laravel Octane + FrankenPHP Configuration
OCTANE_SERVER=frankenphp
OCTANE_HOST=127.0.0.1
OCTANE_PORT=8000
OCTANE_WORKERS=4
OCTANE_MAX_REQUESTS=500
```

## 🚀 High-Performance Deployment with Laravel Octane + FrankenPHP

This application comes pre-configured with Laravel Octane and FrankenPHP for maximum performance.

### What is Laravel Octane + FrankenPHP?

**Laravel Octane** supercharges your application by serving it using high-powered application servers, including **FrankenPHP**. FrankenPHP is a modern PHP application server written in Go that provides:

- **HTTP/2 and HTTP/3 support** - Latest web protocols
- **Built-in HTTPS with automatic certificates** - Production-ready security
- **Worker mode** - Persistent application instances
- **Real-time features** - WebSockets and Server-Sent Events
- **Caddy server integration** - Advanced reverse proxy capabilities

### Performance Benefits

| Server Type | Requests/Second | Memory Usage | Features |
|-------------|-----------------|--------------|----------|
| Traditional PHP-FPM | 50-100 | High | Basic HTTP |
| Laravel Octane + FrankenPHP | 1,000+ | Low | HTTP/2, HTTP/3, Workers |

### Quick Start

#### 1. Development Server
```bash
# Start the high-performance server
./octane.sh start

# Start with file watching (restarts on code changes)
./octane.sh start-watch

# Other commands
./octane.sh stop      # Stop server
./octane.sh restart   # Restart server
./octane.sh reload    # Reload workers
./octane.sh status    # Check status
```

#### 2. Manual Commands
```bash
# Start Octane with custom configuration
php artisan octane:start --host=127.0.0.1 --port=8000 --workers=4

# Start with file watching
php artisan octane:start --watch

# Stop the server
php artisan octane:stop

# Restart the server
php artisan octane:restart

# Reload workers (zero-downtime deployment)
php artisan octane:reload
```

#### 3. Production Deployment

##### Option A: Docker Deployment
```bash
# Build and start with Docker Compose
docker-compose up -d

# Scale workers
docker-compose up -d --scale app=4
```

##### Option B: System Service
Create a systemd service file `/etc/systemd/system/jdih-cms.service`:

```ini
[Unit]
Description=JDIH CMS Octane Server
After=network.target

[Service]
Type=simple
User=www-data
Group=www-data
WorkingDirectory=/path/to/jdih-cms
ExecStart=/usr/bin/php /path/to/jdih-cms/artisan octane:start --host=0.0.0.0 --port=8000 --workers=4
Restart=always
RestartSec=5
Environment=APP_ENV=production

[Install]
WantedBy=multi-user.target
```

Enable and start:
```bash
sudo systemctl enable jdih-cms
sudo systemctl start jdih-cms
```

### Monitoring & Maintenance

#### Health Checks
```bash
# Check server status
curl -I http://localhost:8000/health

# Monitor performance
php artisan octane:status
```

#### Worker Management
```bash
# Reload workers without downtime
php artisan octane:reload

# Restart all workers
php artisan octane:restart
```

#### Performance Tuning
Edit `.env` for optimization:

```env
# Production optimizations
OCTANE_WORKERS=auto          # Auto-detect CPU cores
OCTANE_MAX_REQUESTS=1000     # Requests before worker restart
OCTANE_HTTPS=true           # Enable HTTPS (production)
```

### Advanced Configuration

#### Custom Caddyfile
The included `Caddyfile` provides advanced configuration:

```caddyfile
{$APP_URL} {
    encode gzip
    php_server
    
    # Security headers
    header {
        X-Content-Type-Options nosniff
        X-Frame-Options DENY
        Strict-Transport-Security "max-age=31536000"
    }
}
```

#### Load Balancing
For high-traffic applications, use multiple instances:

```bash
# Start multiple instances on different ports
php artisan octane:start --port=8001 --workers=4 &
php artisan octane:start --port=8002 --workers=4 &
php artisan octane:start --port=8003 --workers=4 &
```

Configure your load balancer (nginx/caddy) to distribute requests.

### Troubleshooting

#### Common Issues

1. **Memory Leaks**: Configure `OCTANE_MAX_REQUESTS` to restart workers periodically
2. **File Changes Not Reflected**: Use `--watch` flag or manually restart
3. **Database Connection Issues**: Ensure proper connection pooling

#### Debug Mode
```bash
# Start with verbose logging
php artisan octane:start --verbose

# Check logs
tail -f storage/logs/laravel.log
```

### File Permissions
Ensure proper permissions for:
```bash
chmod -R 775 storage bootstrap/cache
```

## 📚 Documentation

### API Endpoints
The system provides RESTful API endpoints:

- `GET /api/produk-hukum/peraturan` - List regulations
- `GET /api/produk-hukum/peraturan/{id}` - Get specific regulation
- `GET /api/laws` - List laws with filtering

### Database Structure
Main entities:
- **Legislations** - Legal documents
- **Categories** - Document categories
- **Institutes** - Publishing institutions  
- **Documents** - File attachments
- **Users** - System users

## 🔄 Upgrade Notes

This version has been upgraded from Laravel 10 to Laravel 12 with the following major improvements:

### Framework & Core
- ✅ **Laravel 12**: Latest framework with performance improvements
- ✅ **PHP 8.2**: Enhanced type system and performance
- ✅ **Security**: Latest security patches and features
- ✅ **Dependencies**: All packages updated to latest stable versions

### Admin Interface Revolution
- ✅ **Filament 4.x**: Complete migration to modern admin panel
- ✅ **TALL Stack**: Tailwind, Alpine.js, Laravel, and Livewire integration
- ✅ **Enhanced UX**: Beautiful, intuitive interface for content management
- ✅ **Mobile Responsive**: Admin panel optimized for all devices
- ✅ **Advanced Forms**: Dynamic form builder with validation
- ✅ **Smart Tables**: Sortable, filterable, and searchable data grids
- ✅ **Dashboard Analytics**: Real-time widgets and system monitoring

### Performance & Development
- ✅ **Vite 5**: Faster development and build processes
- ✅ **Modern Frontend**: Updated asset pipeline and tooling
- ✅ **Database Optimization**: Enhanced query performance
- ✅ **Laravel Octane**: High-performance application server integration
- ✅ **FrankenPHP**: Modern PHP server with HTTP/2 and HTTP/3 support
- ✅ **Worker Architecture**: Persistent application state for maximum performance

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🏛️ About

**JDIH CMS** is developed for **Biro Hukum Setda Provinsi Bali** to manage legal documentation and information systems in accordance with Indonesian government regulations for legal information disclosure.

## 📞 Support

For support and questions:
- **Repository**: [https://github.com/adiwp/jdih-bali](https://github.com/adiwp/jdih-bali)
- **Issues**: [GitHub Issues](https://github.com/adiwp/jdih-bali/issues)

---

Made with ❤️ for legal transparency and accessibility