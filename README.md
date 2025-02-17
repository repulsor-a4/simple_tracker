#simple_tracker
Prerequisites:
- Make sure you have instlled and running mysql or mariadb on your testing machine.
- Make sure you have instlled composer (https://getcomposer.org/download/)

Step 1:
git clone https://github.com/repulsor-a4/simple_tracker.git

Step 2:
create a table called tracker in your local mysql or mariadb instance and import the db_schema.sql (the db schema is in php folder)

Step 3:
composer install

Step 4:
composer dump-autoload

Step 5:
cd into php   folder and run: php -S localhost:8080
cd into site1.com folder and run: php -S localhost:8081
cd into site2.com folder and run: php -S localhost:8082
cd into site3.com folder and run: php -S localhost:8083

Step 6:
navigate to http://localhost:8081/index.php in your browser to register a unique hit to page1.com
navigate to http://localhost:8082/index.php in your browser to register a unique hit to page2.com
navigate to http://localhost:8083/index.php in your browser to register a unique hit to page3.com
