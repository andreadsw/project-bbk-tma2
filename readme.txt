++++++++++++++++++++++++++++++++
+ W1 Music Website - APPLICATION DESIGN     +
++++++++++++++++++++++++++++++++

Deploy Location
----------------
/home/adossa03/public_www/webapp/itadossa03_w1_tma

Description
-----------
This package contains the files necessary to install the website W1 Music.  

The codes are some solutions from the previous HOE exercises during the classes with the tutor Gerard Luskin.

The website displays three different pages:

Home: 
- Displays a short welcome message

Artist: 
- Displays a list of the active artists in the database. For each artist shows their name and the number of songs accredited to them. 
- The list is sorted by the artist name in ascending order.
- Displays a summary of the total number of artist actived

Song:
- Displays all of the songs from the database. For each song displays the title of the song, artist name and duration in the format: mm:ss
- The list is sorted first by artist, then by song title and both in ascending order.
- Displays a summary of the total number of song

Installation
------------
Before deploying this application, the necessary database tables need to be 
created and the database created should call adossa03db

If you need to create them, you should login to your database and execute the 
queries found in: sql/w1tma_tables.sql

NB: the "install" directory should not be deployed with the application.

Configuration
-------------
All configuration settings for this application can be found in: _inc/config.inc.php
Adjust these to suit your environment before deploying the application.

Notes
-----
In this application:

1) the css file is stored in 
_assets/css/content.css

2) the class definitions are all stored in
_inc/mydb.class.php

3) the functions definitions are all stored in
_inc/function.inc.php

4) All configuration settings and head/footer files are stored in 
_inc/config.inc.php

5) the template file is stored in 
../_templates

6) The welcome.php, artist.php, songs.php files are stored in 
../views

