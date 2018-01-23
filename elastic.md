### #//查看所有索引:curl -XGET 'localhost:9200/_cat/indices?v'
### #//删除索引:curl -XDELETE 'localhost:9200/megacorp?pretty'
### #//批量导入:curl -XPOST 'localhost:9200/wenwenwo/demand/_bulk?pretty' --data-binary "@demands.json"
### #//查看Mapping:curl -XGET 'localhost:9200/wenwenwo/_mapping/demand?pretty'
### #//删除TYPE:curl -XDELETE http://localhost:9200/index/type
###  curl -XPOST 192.168.1.192:9200/www_news_v1/all/_bulk --data-binary @news.json 导入数据
### 添加别名
```
curl -XPOST 'localhost:9200/_aliases?pretty' -H 'Content-Type: application/json' -d'
{
    "actions" : [
        { "add" : { "index" : "test1", "alias" : "alias1" } }
    ]
}
'
```
### 修改别名
```
curl -XPOST 'localhost:9200/_aliases?pretty' -H 'Content-Type: application/json' -d'
{
    "actions" : [
        { "remove" : { "index" : "test1", "alias" : "alias1" } },
        { "add" : { "index" : "test2", "alias" : "alias1" } }
    ]
}
'
```

curl -XPUT 'localhost:9200/www_demand_v1/_mapping/all?pretty' -H 'Content-Type: application/json' -d'
{
    "all": {
        "properties": {
            "marks": {
                "type":     "short"
            },
            "is_pause":{
                "type":     "short"
            },
            "max_bid":{
                "type":     "short"
            }
        }
    }
}
'

### 拆分词
http://192.168.1.192:9200/_analyze?text=中华人民共和国MN&tokenizer=ik_max_word
