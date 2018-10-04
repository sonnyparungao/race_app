# race_app
Simple Horse Race Simulator

Steps To Run the Project

1. Clone the Project Repository
2. Go to the Project Directory  and open command line
3. Run Composer update --no-scripts
4. Create Database and import horse_race_simulator.sql
5. Create .env file and change the configuration
6. Run php -S localhost:8000 -t public


URL Routes

1. http://localhost:8000
- default public page where user can view the race results
2. http://localhost:8000/login
3. http://localhost:8000/dashboard
- admin can create race, start the race, view the reports
4. http://localhost:8000/horses
- view all the horse data
