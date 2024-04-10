## Requirements:

1) Xampp Server
2) PHP 8.1
3) Laravel 10.x
4) VSCode
5) Node 18.15.0
6) NPM 9.5.0

## Installation:

1) Install and run Xampp Server.
2) Go to "C:\xampp\htdocs" and clone this repository. 
3) Start Apache and Mysql services on Xampp.
4) Go to "http://localhost/phpmyadmin/" and create a new Database named "hospital_manage".
5) Open project in code editor like VSCode.
6) Open terminal and go to project directory.

6) Now run command to install node modules

npm install <br>
npm run build

6) run commands to migrate table schema in database.

php artisan migrate:fresh

6) Run command to insert data in data tables.

php artisan db:seed

7) Run laravel Server

php artisan serve

8) Application will start running on this url "http://127.0.0.1:8000/"


## Predefine User Roles:

1) Admin: have complete Access
2) Staff: have access to Hospitals only

## Predefined User Details:

1) UserId: john01 <br>
   Password: john1234<br>
   Role: Admin

2) UserId: ramk02<br>
   Password: ramkishore1234<br>
   Role: Staff