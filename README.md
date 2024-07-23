# Blog App

This is a Laravel-based blog application. Follow the instructions below to clone and set up the project on your local machine.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)

## Requirements

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- Laravel 10.x
- MySQL
- Node.js & npm
- Bootstrap

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/yourusername/your-repo-name.git
    cd your-repo-name
    ```

2. **Install dependencies:**

    ```sh
    composer install
    npm install
    ```

## Configuration

1. **Copy the `.env.example` file to `.env`:**

    ```sh
    cp .env.example .env
    ```

2. **Generate the application key:**

    ```sh
    php artisan key:generate
    ```

3. **Configure your database and other environment variables in the `.env` file:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

## Database Setup

1. **Run the database migrations:**

    ```sh
    php artisan migrate
    ```

2. **Seed the database:**

    ```sh
    php artisan migrate:fresh --seed
    ```

## Running the Application

1. **Start the local development server:**

    ```sh
    php artisan serve
    ```
    
2. **To execute specific scripts defined in the package.json file:**

    ```sh
    npm run dev
    ```
        
3. **Visit your application in the browser:**

    Open your browser and go to `http://localhost:8000`
