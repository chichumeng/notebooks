CREATE DATABASE `daichao` CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'

CREATE USER `daichao`@`127.0.0.1` IDENTIFIED BY '2qVvcCCFLFYXoVUm';

GRANT Alter, Alter Routine, Create, Create Routine, Create Temporary Tables, Create View, Delete, Drop, Event, Execute, Grant Option, Index, Insert, Lock Tables, References, Select, Show View, Trigger, Update ON `daichao`.* TO `daichao`@`127.0.0.1`;



alter user 'root'@'localhost' identified by 'cy7m0ypu8CpLFperzI45';

flush privileges;


//负载测试
mysqlslap --host=rm-d9jp9jzfgbj09585r.mysql.ap-southeast-5.rds.aliyuncs.com --user=daichao --create-schema=daichao --concurrency=100  --number-of-queries=1000 --iterations=10 --auto-generate-sql -p
