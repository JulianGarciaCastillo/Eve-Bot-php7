# Eve-php7
Experimental Converstational Bot developed with PHP7

## Enviroment
1. Download and extract nginx into c:/nginx
2. Download and extract PHP7 into c:/nginx/php
3. Download phalcon dll file and put into nginx/php/ext
4. Rename php-production.ini to php.ini and add the followind lines
 "extension=C:\nginx\php\ext\php_phalcon.dll"
 "extension=C:\nginx\php\ext\php_pdo_mysql.dll"
5. Clone this repository into c:/nginx/html

## Run nginx
Open cmd and write "start nginx"
[Options]
nginx -s stop  fast shutdown
nginx -s quit  graceful shutdown
nginx -s reload  changing configuration, starting new worker processes with a new configuration, graceful shutdown of old worker processes 
nginx -s reopen  re-opening log files

## Run the PHP service
c:\nginx\php\php-cgi.exe -b 127.0.0.1:9000 -c "c:\nginx\php\php.ini" 