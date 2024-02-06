
# Test Penjualan Hermes

Aplikasi Penjualan Sederhana, Build With Laravel 10, Livewire 3, SQL Server, MySQL, Bootstrap 5

## Requirements

- PHP 8.1
- SQL Server / MySQL

## Table of Contents

- [Test Penjualan Hermes](#test-penjualan-hermes)
  - [Requirements](#requirements)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Setting up](#setting-up)
    - [1. Install Composer Dependencies](#1-install-composer-dependencies)
    - [2. Setup .env](#2-setup-env)
      - [Example](#example)
    - [Database (Choose one)](#database-choose-one)
      - [MySQL Configuration](#mysql-configuration)
      - [SQL Server Configuration](#sql-server-configuration)
    - [3. Generate an application key](#3-generate-an-application-key)
    - [4. Migrate the database](#4-migrate-the-database)
    - [5. Seed the Database](#5-seed-the-database)
  - [Deployment](#deployment)
  - [Login](#login)
    - [User](#user)
    - [Admin](#admin)
  - [Authors](#authors)

## Installation

Clone the repository

```bash
 git clone https://github.com/mocfaisal/test_hermes_penjualan.git
```

Go to the repository directory

```bash
cd /test_hermes_penjualan
```

## Setting up

### 1. Install Composer Dependencies

```bash
composer install
```

### 2. Setup .env

- Duplicate the `.env.example` file and rename it to `.env`
- Open the `.env` file and set your database connection details.

#### Example

```bash
APP_URL=http://127.0.0.1:your_port
```

to

```bash
APP_URL=http://127.0.0.1:8000
```

### Database (Choose one)

#### MySQL Configuration

```bash
# MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tes_hermes_penjualan
DB_USERNAME=root
DB_PASSWORD=
```

#### SQL Server Configuration

```bash
# SQL Server
DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1
DB_PORT=1433
DB_DATABASE=tes_hermes_penjualan
DB_USERNAME=sa
DB_PASSWORD=
```

### 3. Generate an application key

```bash
php artisan key:generate
```

### 4. Migrate the database

```bash
php artisan migrate
```

### 5. Seed the Database

```bash
php artisan db:seed
```

## Deployment

Start the Development Server

```bash
  php artisan serve
```

## Login

### User

```bash
Email : user@user.com
Password : user
```

### Admin

```bash
Email : admin@admin.com
Password : admin
```

## Authors

- [@mocfaisal](https://github.com/mocfaisal/)
