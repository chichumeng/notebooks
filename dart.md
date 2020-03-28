    
## http 排序签名
    String str = '';

    List<String> keys = queryParameters.keys.map((k)=>k.toString()).toList();
    keys.sort();

    for(int i=0;i<keys.length;i++) {
      str += queryParameters[keys[i]].toString();
    }
 sha1.convert(utf8.encode(packageInfo.packageName+pemSha1)).toString
 
 
 
## https pem验证
    (dioHttp.httpClientAdapter  as DefaultHttpClientAdapter).onHttpClientCreate = (client){

      SecurityContext sc = new SecurityContext(withTrustedRoots: false);
      HttpClient httpClient = new HttpClient(context: sc);

      httpClient.badCertificateCallback = (X509Certificate cert, String host, int port){
        print("pem sha1");
        print(cert.sha1.map((i)=>i.toRadixString(16)).join());
        return (cert.sha1.map((i)=>i.toRadixString(16)).join()) == pemSha1;
      };
      return httpClient;
    };
