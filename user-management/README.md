# User Management System


## Prerequisites

Before running this project, ensure you have the following installed:

1. PHP 7.x or higher
2. Composer
3. MySQL or any other database supported by Laravel
4. Git (optional, but useful for cloning the project from GitHub)

## Installation

1. Clone the project from GitHub using the following command:


git clone https://github.com/samehSukkar/userManagement

1. Navigate to the project directory:

cd user-manage/user-management

3. Edit the .env file and configure the database connection settings with your database 

DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=your-database-port
DB_DATABASE=your-database-name
DB_USERNAME=your-database-username
DB_PASSWORD=your-database-password

4. nstall project dependencies using the following command:

composer install

5. Migrate the database tables using the following command:

php artisan migrate

6. Seed the database with the superuser then enter email and password:

php artisan db:seed --class=SuperuserSeeder


7. Serve the application:

php artisan serve
