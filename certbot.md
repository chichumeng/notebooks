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

## nginx online
```
//准备工作
location ^~ /.well-known/acme-challenge/ {
    root    /data/www/certbots/example.com;
    try_files $uri /index.php?$query_string;
}

//生成成功后
server {
    listen 443 ssl;
    listen [::]:443 ssl ipv6only=on;

    ssl_certificate /etc/letsencrypt/live/example.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/example.com/privkey.pem;
    ssl_trusted_certificate /etc/letsencrypt/live/example.com/chain.pem;
}
```