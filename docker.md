docker network create -d bridge lan


docker run --net lan --name nginx -v /data/docker/nginx/conf.d/:/etc/nginx/conf.d/ -v /data/docker/nginx/nginx.conf:/etc/nginx/nginx.conf -p 80:80 -d nginx
docker run --net lan --name mysql-demo -v /data/docker/mysql/demo/:/var/lib/mysql/ -e MYSQL_ROOT_PASSWORD=A@123456 -d mysql:5.7
docker run --net lan --name php-demo -v /data/www/demo/:/data/www/demo/ -d php7.1:latest


docker network create 网络名称
docker run --net=网络名称 mysql
docker run --net=网络名称 tomcat

docker network disconnect 网络名称 tomcat
docker network connect 网络名称  tomcat

docker run --rm -dit --name excalidraw -p 5000:80 excalidraw/excalidraw:latest
