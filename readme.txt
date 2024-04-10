Installation:

1) create database and update DB details in .env file.
2) Open project in code editor like VSCode.
3) Open terminal and execute commands to migrate and seed data in database.

DB Migration:

php artisan migrate:fresh

DB Seeder:

php artisan db:seed


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