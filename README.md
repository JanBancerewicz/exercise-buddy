# Laravel Exercise-buddy App

## Preview

![ss1](https://github.com/JanBancerewicz/exercise-buddy/assets/79080628/01206260-ea67-453d-9099-46579f028d56)


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

6. (Optional) Change the default database seed value at resources/sqlka.sql:

7. Run migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Usage

1. Open the application in your web browser.
2. Set all exercises as "active".
3. If you wish to customize your training plan furthermore, create new exercises using the "Add exercises" button or edit.
4. Mark exercises as "completed" as soon as you finish them.

## Acknowledgments

- Laravel Documentation: https://laravel.com/docs
- Bootstrap: https://getbootstrap.com/
