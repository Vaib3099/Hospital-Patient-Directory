Requirements:

1) Xampp Server
2) PHP 8.1
3) Laravel 10.x
4) VSCode

Installation:

1) Install and run Xampp Server.
2) Start Apache and Mysql services on Xampp.
3) Go to "http://localhost/phpmyadmin/" and create a new Database named "hospital_manage".
4) Open project in code editor like VSCode.
5) Open terminal and go to project directory.

6) run commands to migrate table schema in database.

php artisan migrate:fresh

6) Run command to insert data in data tables.

php artisan db:seed

6) Now run command to 


Predefine User Roles:

1) Admin: have complete Access
2) Staff: have access to Hospitals only

Predefined User Details:

1) UserId: john01
   Password: john1234
   Role: Admin

2) UserId: ramk02
   Password: ramkishore1234
   Role: Staff