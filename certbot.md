## install
```
yum install certbot
or 
git clone https://github.com/certbot/certbot.git
```
## get started
```
//此命令会创建 /data/www/example/.well-known/acme-challenge 目录
//需要能访问访问 http://example.com/.well-known/acme-challenge 
# certbot certonly --webroot -w /data/www/example -d example.com -d www.example.com
```
## automating renewal
```
//手动运行一下,看有没有报错
certbot renew --dry-run
//如果上面的命令没有报错,就可以将下面的命令加入cron 每月执行
certbot renew 
```
## cron
```
sudo crontab -e
30 2 * * 1 /usr/bin/certbot renew  >> /var/log/le-renew.log
```