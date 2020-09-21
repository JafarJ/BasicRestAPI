# Pure PHP RestApi 
Hey! This is a no framework PHP project using PDO for a RestApi including Okta Authentication and an example CRM for testing!
[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)](https://travis-ci.org/badges/badgerbadgerbadger) [![Dependency Status](http://img.shields.io/gemnasium/badges/badgerbadgerbadger.svg?style=flat-square)](https://gemnasium.com/badges/badgerbadgerbadger) [![Coverage Status](http://img.shields.io/coveralls/badges/badgerbadgerbadger.svg?style=flat-square)](https://coveralls.io/r/badges/badgerbadgerbadger) [![Code Climate](http://img.shields.io/codeclimate/github/badges/badgerbadgerbadger.svg?style=flat-square)](https://codeclimate.com/github/badges/badgerbadgerbadger) [![Github Issues](http://githubbadges.herokuapp.com/badges/badgerbadgerbadger/issues.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger/issues) [![Pending Pull-Requests](http://githubbadges.herokuapp.com/badges/badgerbadgerbadger/pulls.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger/pulls) [![Gem Version](http://img.shields.io/gem/v/badgerbadgerbadger.svg?style=flat-square)](https://rubygems.org/gems/badgerbadgerbadger) [![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org) [![Badges](http://img.shields.io/:badges-9/9-ff6799.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine with XAMPP for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Import the sql file located inside the SQL folder (WARNING: Write, update and delete functions will only work with the included db) and if using Okta OAuth2 create account and new application to get neccesary data, tutorials on how to get your client started are on the official website https://www.okta.com/, further explanation down below!

### A step by step guide.

Make sure your file is inside Drive:\xampp\htdocs if using XAMPP for the local server. 

Open "conection.php" inside "php" folder and modify the variables $dsn, $user, $password and $dbName to your data. 
https://i.pinimg.com/originals/85/b8/cf/85b8cf2b4ac58b56159a3e46294595a2.png

If you don´t want to use Okta Auth then delete or ignore the "oauth2.php" file inside "php" folder and go to the file "authetication.php" and comment out or delete this line.
https://i.pinimg.com/originals/1d/a4/30/1da430f9526451c7cc5cb4c94265b22d.png

If you wanted to use Okta inside "oauth2.php" change the following variables to your data.
https://i.pinimg.com/originals/e0/55/3e/e0553ef01ffb30392579fcb3ea08136b.png

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
