# XAMPP Personal Blog Template
A fully functional personal blog web application built on XAMPP with account authentication. Users can login, create and manage posts. The app also has an RSS feed, provided you connect it to the API. The client is built with JavaScript, HTML, CSS, the backend is built with PHP, while the database is built with MariaDB.

## Features
- **Simple Home Page**: Cross-platform homepage with random quote in banner and a responsive navbar.
![Screenshot](homepage.png)

- **Login**: Users can log in based on account info in the database.
![Screenshot](login.png)

- **Admin Menu**: Admin users can manage posts and post categories.
![Screenshot](menu.png)

- **Post**: Admin users and public users can create posts within categories. Public users can view posts.
![Screenshot](newpost.png)
![Screenshot](post.png)

- **RSS Feed**: The blog can connect to RSS feeds via API, and it will display them in the 'News' page.
![Screenshot](RSSfeed.png)

## Technologies / Requirements
- The application was built on [XAMPP 8.0.12](https://www.apachefriends.org/download.html) on Windows 10.

# Getting Started

## Installing
- Move the files to your web server: (Everything in the 'blog' folder.) Leave the file and folder structure as is, as the program uses relative navigation for url paths.
- Make sure the web server is running (e.g. xampp)
- Go to the url (e.g. "http://localhost/phpmyadmin"), log in to phpAdmin. Create your own schema, or optionally use the example schema.
- Import your database by importing example_schema.sql file, and also the rss_feed.sql file.
- Navigate in your local machine, to the url which points to the 'blog' folder: (e.g. "http://localhost/blog/").
- Because this application uses HTTPS, you may need to confirm proceeding to the path initially.
- If you see the My Blog home page, then your installation is complete. 

## Usage and Testing
- Once logged in as an admin, select the "Post Manager" link and try the following features:
    - Switch categories from the categories list.
    - Select a post under the selected category.
    - Edit or Delete the post.
    - Choose and upload a new file for the post.
    - Add a new post under "Menu".
  
- Category/Topic Manager Usage + Testing:
  - Once logged in as an admin, update a category name, add one or delete one. You may only delete a category if there are no posts under that category.

- News RSS Feed Aggregator Usage + Testing:
  - Select the "News" link in the navbar to browse the aggregated RSS feed articles. They link to the original sources.

## Deployment
The application is meant for local development. It will require further work to deploy to a production environment.

## License
All rights reserved.

## Credits
- Many of the implementations, including navigation control, MVC architecture, OOP, and security features were based on Murach’s PHP and MySQL 2nd edition, by Joel Murach and Ray Harris.