# Laravel Exercise-buddy App

## Introduction

## Requirements

- PHP 8.1 or higher
- Composer
- Laravel 10
- MySQL

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/JanBancerewicz/exercise-buddy.git
    ```

2. Navigate to the project directory:

    ```bash
    cd exercise-buddy
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your database settings:

    ```bash
    cp .env.example .env
    ```

    Update the database information in the `.env` file:

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Run migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Usage

1. Open the application in your web browser.
2. Create new tasks using the "Add task" button.
3. Mark your tasks as either "completed" or "active".

## Acknowledgments

- Laravel Documentation: https://laravel.com/docs
- Bootstrap: https://getbootstrap.com/