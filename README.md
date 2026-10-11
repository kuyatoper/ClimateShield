# 🛡️ ClimateShield

### Environmental Climate Monitoring & Disaster Awareness System

ClimateShield is a web-based environmental monitoring and disaster awareness platform designed to help users monitor current environmental conditions, view reported hazards, and access information that can help communities prepare for climate-related risks.

The system combines real-time environmental data with community hazard reporting and administrative management tools.

---

## 🌍 Features

### 🌦️ Environmental Monitoring

ClimateShield displays current environmental conditions using external weather and air-quality data.

* 🌡️ Temperature
* 💧 Humidity
* 🌧️ Precipitation
* 💨 Wind speed
* 🌫️ Air Quality Index (AQI)
* 🚨 Flood risk assessment

### 🗺️ Hazard Map

Users can view reported environmental hazards through an interactive map.

Supported hazard information includes:

* Hazard type
* Severity
* Location
* Description
* Current status
* Report information

### 🚨 Hazard Reporting

Authenticated users can submit reports about environmental hazards they encounter.

Reports can be reviewed and managed through the administrative system.

### 👤 User Authentication

ClimateShield provides user authentication features including:

* User registration
* Login
* Logout
* Protected application pages
* Role-based administrative access

### 🛠️ Administration

Administrators can manage environmental information through dedicated administrative pages.

Admin functionality includes:

* Hazard management
* Project management
* Hazard review
* Environmental data management

### 🌱 Environmental Projects

Users can view environmental and climate-related projects managed through the system.

### 📚 Environmental Guides

ClimateShield provides educational guides containing information related to environmental awareness and disaster preparedness.

---

## 🧰 Technology Stack

| Technology         | Purpose                      |
| ------------------ | ---------------------------- |
| **Laravel 13**     | Backend web framework        |
| **PHP 8.3+**       | Server-side programming      |
| **Blade**          | Application views            |
| **JavaScript**     | Frontend interactions        |
| **CSS**            | User interface styling       |
| **MySQL / SQLite** | Database                     |
| **Open-Meteo API** | Weather and air-quality data |
| **Git / GitHub**   | Version control              |

---

## 🌦️ External Data

ClimateShield currently uses the Open-Meteo API to retrieve environmental information.

Weather data includes:

* Temperature
* Relative humidity
* Precipitation
* Wind speed

Air-quality data includes:

* European AQI
* PM2.5
* PM10

The application currently uses Cebu-area coordinates for environmental monitoring.

---

## 📁 Project Structure

```text
ClimateShield/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── Services/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   └── web.php
│
├── public/
│
├── tests/
│
├── composer.json
├── package.json
└── README.md
```

---

## ⚙️ Requirements

Before installing ClimateShield, make sure the following are installed:

* PHP 8.3 or newer
* Composer
* Node.js 20 or newer
* npm
* Git
* MySQL or SQLite

---

## 🚀 Installation

Clone the repository:

```bash
git clone https://github.com/kuyatoper/ClimateShield.git
cd ClimateShield
```

Install PHP dependencies:

```bash
composer install
```

Create the environment file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure the database in `.env`, then run:

```bash
php artisan migrate
```

Install frontend dependencies:

```bash
npm install
```

Build the frontend:

```bash
npm run build
```

Start the Laravel development server:

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

## 💻 Development

During development, use:

```bash
npm run dev
```

and in another terminal:

```bash
php artisan serve
```

This allows frontend assets to update while developing.

---

## 🔐 Application Areas

The application currently contains the following major areas:

```text
Dashboard
   │
   ├── Environmental Monitoring
   ├── Flood Risk
   ├── Hazard Reports
   └── Current Conditions
        │
        ├── Hazard Map
        ├── Projects
        └── Environmental Guides

Administration
   │
   ├── Hazard Management
   └── Project Management
```

---

## 🎯 Project Goal

ClimateShield aims to provide a centralized platform where users can:

1. Monitor environmental conditions.
2. View reported hazards.
3. Report environmental incidents.
4. Access environmental and disaster-preparedness information.
5. Allow administrators to manage environmental reports and projects.

The project focuses on improving environmental awareness and making climate-related information easier to access.

---

## 🔮 Planned Improvements

Future development may include:

* 📊 Environmental trend charts
* 🔔 Real-time environmental alerts
* 📍 Improved hazard filtering
* 🗺️ Enhanced hazard visualization
* 📈 Historical environmental data
* ⚡ API response caching
* 🧪 Expanded automated testing
* 📱 Further mobile optimization

---

## 👥 Project

**ClimateShield — Environmental Climate Monitoring & Disaster Awareness System**

Developed as an academic software project.

---

## 📄 License

This project is developed for educational purposes.



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ClimateShield Setup

ClimateShield is a Laravel application. The repository contains the source code; generated dependencies and compiled assets are intentionally excluded from Git.

### Requirements

- PHP 8.2 or newer
- Composer
- Node.js 20 or newer
- npm

### Installation

```bash
git clone <repository-url>
cd ClimateShield-mainGroup7
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000` in a browser.

On Windows, double-click `start-climateshield.bat` whenever you want to open the
website. It starts the local Laravel server in a separate window, so the site
continues running after you close the original VS Code terminal. Keep the
server window open while using the website.

During development, use two terminals instead of `npm run build`:

```bash
npm run dev
php artisan serve
```

The JavaScript and CSS source files are in `resources/js` and `resources/css`. The compiled files in `public/build` are generated locally and are not committed.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
