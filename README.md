# race_app
Simple Horse Race Simulator

Steps To Run the Project

1. Clone the Project Repository
2. Go to the Project Directory  and open command line
3. Run composer install
4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Linux
5. Run php artisan key:generate
6. Create Database and import horse_race_simulator.sql
7. Change the database configuration in .env file
8. Run php -S localhost:8000 -t public or php artisan serve



URL Routes

1. http://localhost:8000
- default public page where user can view the race results
2. http://localhost:8000/login
3. http://localhost:8000/dashboard
- admin can create race, start the race, view the reports
4. http://localhost:8000/horses
- view all the horse data
