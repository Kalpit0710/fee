# School Fee Management System

![Laravel](https://img.shields.io/badge/Laravel-v11-FF2D20?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-v8.0+-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-v8.0+-4479A1?logo=mysql)
![QR Payment](https://img.shields.io/badge/QR_Payment-Supported-00C244)
![Bootstrap](https://img.shields.io/badge/Bootstrap-v5.2.3-7952B3?logo=bootstrap)

A comprehensive web application for educational institutions to manage student fee collections, receipt generation, and payment tracking.

## 📋 Overview

This School Fee Management System provides a complete solution for educational institutions to handle fee payments, generate receipts, and manage financial transactions. Built with Laravel 11, it offers a secure and user-friendly interface for both students/parents and administrators.

## ✨ Key Features

### For Students/Parents
- **Online Fee Payment** through dynamic payment links and QR codes
- **Receipt Generation** with downloadable PDF format
- **Payment History** tracking with transaction details
- **Class-Specific Fee Structure** display

### For Administrators
- **Comprehensive Dashboard** showing payment analytics
- **Transaction Management** with search and filter capabilities
- **Refund Processing** directly through the admin panel
- **Fee Structure Management** for different classes
- **Transaction Reports** with export functionality
- **QR Code Generation** for contactless payments

## 🔧 Technology Stack

- Backend Framework: Laravel v11
- Database: MySQL v8.0+
- Payment Processing: Dynamic payment links and QR code generation
- Frontend: HTML5, Bootstrap v5.2.3
- Authentication: Laravel built-in auth
- Templates: Blade templating engine

## 📊 System Architecture

The application follows MVC architecture with:

- Models: Payment, ClassFees
- Controllers: FormController, AdminController, DisplayController
- Views: Blade templates for frontend rendering

## 🚀 Installation & Setup

1. **Clone the repository:**
   ```
   git clone https://github.com/kalpit0710/fee.git
   ```

2. **Install dependencies:**
   ```
   composer install
   ```

3. **Configure environment:**
   ```
   cp .env.example .env
   ```

4. **Generate application key:**
   ```
   php artisan key:generate
   ```

5. **Configure your database in .env:**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=schoolfeesportal
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seed the database:**
   ```
   php artisan migrate
   php artisan db:seed
   ```

7. **Start the development server:**
   ```
   php artisan serve
   ```

## 🔐 Default Admin Credentials

- Email: admin@example.com
- Password: password123

## 🔄 Application Workflow

### Student Fee Payment Flow
1. Student fills payment form with personal details
2. System fetches applicable fee amount based on class
3. Dynamic payment link and QR code are generated
4. Upon success, payment record is created and receipt generated

### Admin Management Flow
1. Admin logs in via secure portal
2. Dashboard displays payment statistics and recent transactions
3. Admin can search transactions, process refunds, and update fee structures
4. Reporting tools allow for data export and analysis

## 📱 Usage Examples

### Making a Fee Payment
1. Visit the homepage
2. Enter student details and select class/month
3. Scan generated QR code or use payment link
4. Download receipt upon successful payment

### Downloading a Receipt Later
1. Visit the receipt download page
2. Enter student details used during payment
3. System retrieves and generates downloadable receipt

### Admin Dashboard Access
1. Navigate to /admin/login
2. Enter admin credentials
3. Access comprehensive management tools

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 📞 Support

For support or inquiries, please open an issue in the repository or contact the project maintainer.

Note: This system is designed for educational institutions to streamline their fee collection process. The implementation can be customized according to specific institutional requirements.
