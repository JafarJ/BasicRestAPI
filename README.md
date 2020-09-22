# Pure PHP RestApi 
Hey! I´m Jafar Jabbarzadeh, a wannabe software engineer from Las Palmas de Gran Canaria! https://www.linkedin.com/in/jafarjabbarzadeh/ And this is a no framework PHP project using PDO for a RestApi including Okta Authentication and an example CRM for testing! 

[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)](https://travis-ci.org/badges/badgerbadgerbadger) [![Coverage Status](http://img.shields.io/coveralls/badges/badgerbadgerbadger.svg?style=flat-square)](https://coveralls.io/r/badges/badgerbadgerbadger) [![Gem Version](http://img.shields.io/gem/v/badgerbadgerbadger.svg?style=flat-square)](https://rubygems.org/gems/badgerbadgerbadger) [![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org) [![Badges](http://img.shields.io/:badges-9/9-ff6799.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine with XAMPP for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Import the SQL file located inside the SQL folder (WARNING: Write, update and delete functions will only work with the included DB) and if using Okta OAuth2 create an account and new application to get necessary data, tutorials on how to get your client started are on the official website https://www.okta.com/, further explanation down below!

### A step by step guide.

Make sure your file is inside Drive:\xampp\htdocs if using XAMPP for the local server. 

* Open "conection.php" inside "php" folder and modify the variables $dsn, $user, $password and $dbName to your data. 
![ScreenShot](https://i.pinimg.com/originals/85/b8/cf/85b8cf2b4ac58b56159a3e46294595a2.png)

* If you don´t want to use Okta Auth then delete or ignore the "oauth2.php" file inside the "PHP" folder and go to the file "authetication.php" and comment out or delete this line.
![ScreenShot](https://i.pinimg.com/originals/1d/a4/30/1da430f9526451c7cc5cb4c94265b22d.png)

* If you wanted to use Okta inside "oauth2.php" change the following variables to your data.
![ScreenShot](https://i.pinimg.com/originals/e0/55/3e/e0553ef01ffb30392579fcb3ea08136b.png)

## And you have it ready!

Now go and play with the API, oh, you want to deploy it?

## Deployment

I mean it doesn´t change much. Make sure you get the user and password of the DB your provider provides, insert them into your connection file, don´t forget to import the given SQL, and set up your OAuth2. 

In my case https://www.siteground.es/ was used, I added it in a folder at my existing website, visit it if you want a little test https://glytchware.com/ProjectGlytchware/RESTApi/CRM/access.php, access it using the account "user" with password "user". Just a reminder that there is no mobile version yet. The CRM is only for testing and only works on desktop.

## Access through Postman

If you want to access the API through a Dev tool like https://www.postman.com/ follow the instructions. *This will be expecting your conection.php file to be properly set up with your db and credentials. Everything you´ll receive will be in JSON format.*

* Add your local or live URL under the "PHP" folder as the request URL
* For *reading* existing tables get to "/php/list_tables.php" and add param "dbname" with value "glytchwa_tamrestapi"
* For *reading* table contents get to "/php/list_table_content.php" and add param "tableName" with value of the table you want to see.
* For *writing* get to "/php/write.php", add param "tableName" and "sessionid" (which would be the id of who would create it so whatever number is fine) and in the request body add as form-data the following keys:
     - For "users" table, "submit" (which has to be value true), "name", "surname", "password", "password2", "role", "image"(which is a file)
     - For "customer" table, "submit" (which has to be value true), "name", "surname", "image"(which is a file)
     - For "permissions" table, "submit" (which has to be value true), "table_name" and "permission"
* For *update* get to "/php/update.php" , add param "tableName", "sessionid" and "idToUpdate" (which would be the id of the user that should be updated) with the same request body than for writing. 
* For *delete* get to "/php/delete.php" and just send "tableName" and "idToUpdate" (id of user to be deleted)

## Troubleshooting contact

For any issues regarding the code, be it something not working properly or with my attempts at explaining, even for suggestions, contact directly trough my LinkedIn https://www.linkedin.com/in/jafarjabbarzadeh/. I´m still fairly new to this so issues can exist. Thanks!

## Built With

* [PHP] No framework backend language
* [Okta] OAut2 Authentication
* [HTML/CSS] Test CRM

## Author

* **Jafar Jabbarzadeh** - *Fully stacked* - [linkedIn](https://www.linkedin.com/in/jafarjabbarzadeh/)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thanks Stack Overflow
* Coffee
* Education?
