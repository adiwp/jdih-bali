# JDIH CMS - Biro Hukum Provinsi Bali

> **Sistem Informasi Jaringan Dokumentasi dan Informasi Hukum**

A comprehensive JDIH (Legal Documentation and Information Network) Content Management System built with **Laravel 12** and modern web technologies. This system is designed for managing legal documents, regulations, and legal information for government institutions.

![Laravel 12](https://img.shields.io/badge/Laravel-12.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)
![Vite](https://img.shields.io/badge/Vite-5.x-646CFF.svg)

## ✨ Features

- **Legal Document Management**: Laws, regulations, monographs, articles, and court decisions
- **Advanced Search & Filtering**: Multi-criteria search with faceted navigation
- **Document Categorization**: Comprehensive taxonomy and classification system
- **PDF Viewer Integration**: Adobe PDF Embed API for document preview
- **QR Code Generation**: Easy document sharing with QR codes
- **Export Capabilities**: Excel and PDF export functionality
- **API Integration**: RESTful API for external system integration
- **Responsive Design**: Mobile-friendly interface
- **Multi-language Support**: Indonesian and English localization
- **User Management**: Role-based access control
- **Analytics & Reporting**: Visitor tracking and download statistics

## 🚀 Technology Stack

### Backend
- **Laravel 12.x** - Latest PHP framework with modern features
- **PHP 8.2+** - Latest PHP with improved performance
- **MySQL 8.0+** - Robust database management
- **Laravel Sanctum 4.0** - API authentication
- **Laravel Fortify 1.30** - Frontend authentication scaffolding

### Frontend
- **Vite 5.x** - Next generation frontend tooling
- **Bootstrap 5** - Modern CSS framework
- **Limitless Template** - Professional admin template
- **Adobe PDF Embed API** - Document viewer integration

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
- **Apache/Nginx** web server

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
```bash
php artisan serve
```

Visit http://localhost:8000 and login with:
- **Username:** admin
- **Password:** password

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

This version has been upgraded from Laravel 10 to Laravel 12 with the following improvements:

- ✅ **Performance**: Significant speed improvements
- ✅ **Security**: Latest security patches and features
- ✅ **Dependencies**: All packages updated to latest stable versions
- ✅ **PHP 8.2**: Enhanced type system and performance
- ✅ **Modern Frontend**: Vite 5 for faster development

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