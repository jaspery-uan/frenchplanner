## French Learning Tracker Application

The French Learning Skills Tracking Application is a web-based portfolio and progress-tracking platform designed for use by French language teachers and students at Merivale High School. Developed by Laura Danes, Jasper Yuan, and Joshua Wang, this application aims to offer streamlined student-teacher communication and progress monitoring for writing skills.

This system is based on the Portfolio model developed by Ms. Herfst and Ms. Pierson and is tailored to enhance the learning experience through detailed logging of the learning process.

### Key features:
- Teacher Dashboard: View individual student progress over time.
- Login System: Email and password-based login.

### Access instructions
These instructions assume that the necessary software (Laravel Herd, composer and node) is downloaded locally and the files are up to date.
1. Open the local folder on VSCode. 
2. Open Windows PowerShell terminal.
3. Run formatting with the following line:
```
npm run dev
```
4. Visit http://csproject.test.

### Initial Setup
These instructions assume that the user has not accessed any package or application relevant to this project beyond the README.md file.
1. Download Laravel Herd, choosing the preferred setup specifications for the user.
2. Open the preferred IDE and access the Git Bash terminal.
3. Clone this repository and enter the newly created folder with the following lines:
```
git clone https://github.com/jaspery-uan/frenchplanner.git
cd frenchplanner
```
4. Install the PHP and frontend (JS/CSS) dependencies with the following lines:
```
composer install
npm install
```
5. Set up the .env file using .env.example:
```
cp .env.example .env
```
6. Generate the app key:
```
php artisan key:generate
```
7. Build the frontend assets using Vite:
```
npm run dev
```
8. Open the locally hosted site http://csproject.test.

### References

[1] J. Otwell, 30 Days to Learn Laravel 11 [Online]. Available: https://laracasts.com/series/30-days-to-learn-laravel-11

[2] Laravel, "Common Issues – Windows Troubleshooting," Laravel Herd Documentation, [Online]. Available: https://herd.laravel.com/docs/windows/troubleshooting/common-issues

All edited files are indicated so by the personalized header at the beginning. It should be noted that the following folders and files were created by the Laravel Herd project template and were not edited during the development process:

- App\Providers
- Bootstrap
- Config
- Database\Factories\UserFactory
- Database\Migrations\ (create users, create cache, create jobs)
- Public
- Resources\js
- Storage
- Tests
- .editorconfig
- .env.example
- .gitattributes
- .gitignore
- artisan
- composer.json
- composer.lock
- package-lock.json
- package.json
- phpunit.xml
- vite.config.js
