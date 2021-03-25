sudo tcpdump -i any tcp port 9501
需要要看通信的数据内容，可以加 -Xnlps0 参数


strace -o /tmp/strace.log -f -p $PID

gdb -p 进程ID
gdb php
gdb php core

lsof -p [进程ID]

perf top -p [进程ID]

ulimit -n 要调整为 100000 甚至更大。 命令行下执行 ulimit -n 100000 即可修改。如果不能修改，需要设置 /etc/security/limits.conf，加入

* soft nofile 262140
* hard nofile 262140
root soft nofile 262140
root hard nofile 262140
* soft core unlimited
* hard core unlimited
root soft core unlimited
root hard core unlimited

注意，修改 limits.conf 文件后，需要重启系统生效

内核设置
Linux 操作系统修改内核参数有 3 种方式：

修改 /etc/sysctl.conf 文件，加入配置选项，格式为 key = value，修改保存后调用 sysctl -p 加载新配置
使用 sysctl 命令临时修改，如：sysctl -w net.ipv4.tcp_mem="379008 505344 758016"
直接修改 /proc/sys/ 目录中的文件，如：echo "379008 505344 758016" > /proc/sys/net/ipv4/tcp_mem


net.unix.max_dgram_qlen = 100



开启 CoreDump
设置内核参数

kernel.core_pattern = /data/core_files/core-%e-%p-%t
Copy to clipboardErrorCopied
通过 ulimit -c 命令查看当前 coredump 文件的限制

ulimit -c
Copy to clipboardErrorCopied
如果为 0，需要修改 /etc/security/limits.conf，进行 limit 设置。

开启 core-dump 后，一旦程序发生异常，会将进程导出到文件。对于调查程序问题有很大的帮助


net.ipv4.tcp_syncookies=1
net.ipv4.tcp_max_syn_backlog=81920
net.ipv4.tcp_synack_retries=3
net.ipv4.tcp_syn_retries=3
net.ipv4.tcp_fin_timeout = 30
net.ipv4.tcp_keepalive_time = 300
net.ipv4.tcp_tw_reuse = 1
net.ipv4.tcp_tw_recycle = 1
net.ipv4.ip_local_port_range = 20000 65000
net.ipv4.tcp_max_tw_buckets = 200000
net.ipv4.route.max_size = 5242880


