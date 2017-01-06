# Patolab


Framework: Laravel
Database: MYSQL

Front end: Bootstrap CSS Framework, Jquery


************PATOLAB - A Pathology Lab Reporting System******

Welcoming to using our Lab Reporting System. This text file contains how you will go about installing the app. The menu are:

1. Steps to create and initialize Database.
2. Things to do on server to prepare the source code to build/run properly.
3. Assumptions made and missing requirements that are not covered.
4. Feedback for later improvements.


*****************************************************************************************************************************************************************

STEPS TO CREATE AND INITIALIZE DATABASE

You will have the single script file named "patolab.sql" in the source folder. Running this will install the Database on the server.

To set up the app for database connection, locate the file ".env" also in root folder of the project. and edit the connection settings

Example

DB_CONNECTION=mysql
DB_HOST=SERVER IP
DB_PORT=3306
DB_DATABASE=patolab
DB_USERNAME=YOUR USERNAME
DB_PASSWORD=YOUR PASSWORD


***************************************************************************************************************************




STEPS TO PREPARE THE SOURCE CODE TO BUILD/RUN PROPERLY

Copy the project folder to the root of your server and point to the url <servername>/<projectname> in your web browser

This should take to the root of the project, then click on public

With that you have the welcome page.

To logIn as Patient Click on "LOG IN" at right hand corner

while to login as Operator you navigate to url <servername>/patolab/public/operator

NOTE: for PHP MAILER TO WORK YOU HAVE TO CONFIGURE WITH YOUR PERSONAL GMAIL ACCOUNT (ALREADY REMOVED MINE)

Where to configure path:patolab\app\Http\Controller\ReportController.php


**************************************************************************************************************************************************************************

ASSUMPTIONS MADE AND MISSING REQUIREMENTS NOT COVERED.


1. Apologize for not using the patients name for logIn, had some issue with the plugin i use for suggest and the time frame was going. So for Patient Log IN "Email and Passcode" is used. Which the email is unique.

Email and Passsword is used for Login for both operator and patient

Every test has a physician.


********************************************************************************************************************************


FEEDBACK FOR LATER IMPROVEMENTS.


1. Add Search feature to the Application in order to locate content easily.

2. Add New test during edit of Report.


****************************************************************************************************************************





<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).



