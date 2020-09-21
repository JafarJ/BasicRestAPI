# Pure PHP RestApi 
Hey! I´m Jafar Jabbarzadeh, wannabe software engineer from Las Palmas de Gran Canaria! https://www.linkedin.com/in/jafarjabbarzadeh/ And this is a no framework PHP project using PDO for a RestApi including Okta Authentication and an example CRM for testing! 

[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)](https://travis-ci.org/badges/badgerbadgerbadger) [![Coverage Status](http://img.shields.io/coveralls/badges/badgerbadgerbadger.svg?style=flat-square)](https://coveralls.io/r/badges/badgerbadgerbadger) [![Gem Version](http://img.shields.io/gem/v/badgerbadgerbadger.svg?style=flat-square)](https://rubygems.org/gems/badgerbadgerbadger) [![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org) [![Badges](http://img.shields.io/:badges-9/9-ff6799.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine with XAMPP for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Import the sql file located inside the SQL folder (WARNING: Write, update and delete functions will only work with the included db) and if using Okta OAuth2 create account and new application to get neccesary data, tutorials on how to get your client started are on the official website https://www.okta.com/, further explanation down below!

### A step by step guide.

Make sure your file is inside Drive:\xampp\htdocs if using XAMPP for the local server. 

Open "conection.php" inside "php" folder and modify the variables $dsn, $user, $password and $dbName to your data. 
![ScreenShot](https://i.pinimg.com/originals/85/b8/cf/85b8cf2b4ac58b56159a3e46294595a2.png)

If you don´t want to use Okta Auth then delete or ignore the "oauth2.php" file inside "php" folder and go to the file "authetication.php" and comment out or delete this line.
![ScreenShot](https://i.pinimg.com/originals/1d/a4/30/1da430f9526451c7cc5cb4c94265b22d.png)

If you wanted to use Okta inside "oauth2.php" change the following variables to your data.
![ScreenShot](https://i.pinimg.com/originals/e0/55/3e/e0553ef01ffb30392579fcb3ea08136b.png)

## And you have it ready!

Now go and play with the API, oh, you want to deploy it?

## Deployment

I mean it doesn´t change much. Make sure you get user and password of the db your provider provides, insert them into your conection file, don´t forget to import the given sql and set up your OAuth2. 

In my case https://www.siteground.es/ was used, I added it in a folder at my existing website, visit it if you want a little test https://glytchware.com/ProjectGlytchware/RESTApi/CRM/access.php , access it using the account "user" with password "user". Just a reminder that there is no mobile version yet. The CRM is only for testing and only works on desktop.

## Built With

* [PHP] No framework backend language
* [Okta] OAut2 Authentication
* [HTML/CSS] Test CRM

## Author

* **Jafar Jabbarzadeh** - *Full stacked* - [linkedIn](https://www.linkedin.com/in/jafarjabbarzadeh/)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thanks Stack Overflow
* Coffee
* Education?
