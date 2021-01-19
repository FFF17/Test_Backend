Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@FFF17 
gothinkster
/
laravel-realworld-example-app
55
923508
Code
Issues
15
Pull requests
2
Actions
Projects
Wiki
Security
Insights
You’re making changes in a project you don’t have write access to. Submitting a change will write it to a new branch in your fork FFF17/laravel-realworld-example-app, so you can send a pull request.
laravel-realworld-example-app
/
readme.md
 

Spaces

4

Soft wrap
1
# ![Laravel Example App](logo.png)
2
​
3
[![Build Status](https://img.shields.io/travis/gothinkster/laravel-realworld-example-app/master.svg)](https://travis-ci.org/gothinkster/laravel-realworld-example-app) [![Gitter](https://img.shields.io/gitter/room/realworld-dev/laravel.svg)](https://gitter.im/realworld-dev/laravel) [![GitHub stars](https://img.shields.io/github/stars/gothinkster/laravel-realworld-example-app.svg)](https://github.com/gothinkster/laravel-realworld-example-app/stargazers) [![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)
4
​
5
> ### Example Laravel codebase containing real world examples (CRUD, auth, advanced patterns and more) that adheres to the [RealWorld](https://github.com/gothinkster/realworld-example-apps) spec and API.
6
​
7
This repo is functionality complete — PRs and issues welcome!
8
​
9
----------
10
​
11
# Getting started
12
​
13
## Installation
14
​
15
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)
16
​
17
Alternative installation is possible without local dependencies relying on [Docker](#docker). 
18
​
19
Clone the repository
20
​
21
    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
22
​
23
Switch to the repo folder
24
​
25
    cd laravel-realworld-example-app
26
​
27
Install all the dependencies using composer
28
​
29
    composer install
30
​
31
Copy the example env file and make the required configuration changes in the .env file
32
​
33
    cp .env.example .env
34
​
35
Generate a new application key
36
​
37
    php artisan key:generate
38
​
39
Generate a new JWT authentication secret key
40
​
41
    php artisan jwt:generate
42
​
43
Run the database migrations (**Set the database connection in .env before migrating**)
44
​
45
    php artisan migrate
46
​
47
Start the local development server
48
​
49
    php artisan serve
50
​
51
You can now access the server at http://localhost:8000
52
​
53
**TL;DR command list**
54
​
@FFF17
Propose changes
Commit summary
Update readme.md
Optional extended description
Add an optional extended description…
 
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
