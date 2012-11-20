# Installation

1. Clone repository
2. Import data structure from the /sql/ folder into MySQL
3. Fill-in /inc/config-sample.php with your local configuration
4. Rename /inc/config-sample.php to /inc/config.php
5. Be sure to have Apache taking .htaccess files into account
6. You're good to go!

# Limits

* No i18n support
* Really simple user account management: no password recovery, no fancy avatar etc.
* Most URL are hardcoded
* No non-empty checks on the server side for some important variables - relies entirely on HTML5 and the "required" attribute - which is bad, but quick and easy for a demo
* Really simple

# Why it is good

* It follows a custom MVC pattern
* It uses PDO
* It is quite extensible
* Its code is consistent
* There is no magic
* It logs all the user statuses, not only the current one (good for history)

# Future Work

If you ever wanted to support teams of users, you could create 2 new tables

1. team
2. user_teams

where you would store the teams properties and its association with user.

You then could extend the current application and write new views and new managers to get the data filtered by team.
