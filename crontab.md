root
5 4 * */2 * /usr/local/certbot/certbot-auto renew > /dev/null 2>&1
5 1 */1 * * /bin/bash /data/cronts/backup.xueyuan.sql.sh > /dev/null 2>&1
30 1 */1 * * /bin/bash /data/cronts/backup.jsjzjz.sql.sh > /dev/null 2>&1

www
* * * * * /usr/local/php7/bin/php /data/www/www.jsjzjz.com/artisan schedule:run >> /dev/null 2>&1
* * * * * /usr/local/php7/bin/php /data/www/www.wwwjcsc.com/artisan schedule:run >> /dev/null 2>&1