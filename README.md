## Requirements:

1) Xampp Server 3.3.0
2) PHP 8.2.0
3) VSCode
4) Node 18.15.0
5) npm 9.5.0

## Installation:

1) Install and run Xampp Server.
2) Go to "C:\xampp\htdocs" and clone this repository. 
3) Start Apache and Mysql services on Xampp.
4) Go to "http://localhost/phpmyadmin/" and create a new Database named "hospital_manage".
5) Open project in code editor like VSCode.
6) Open terminal and go to project directory.

7) Now run command to install node modules

npm install <br>
npm run build

8) run commands to migrate table schema in database.

php artisan migrate:fresh

9) Run command to insert data in data tables.

php artisan db:seed

10) Run laravel Server

php artisan serve

11) Application will start running on this url "http://127.0.0.1:8000/"


## Predefine User Roles:

1) Admin: have complete Access
2) Role 01: have access to Hospitals only
3) Role 02: have access to Hospitals and Patients

## Predefined User Details:

1) UserId: john01 <br>
   Password: john1234<br>
   Role: Admin

2) UserId: ramk02<br>
   Password: ramkishore1234<br>
   Role: Role 01

3) UserId: jane03<br>
   Password: janedayn1234<br>
   Role: Role 02