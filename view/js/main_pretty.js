function amigable(url) {
    var link="";
    url = url.replace("?", "");
    url = url.split("&");
    cont = 0;
    for (var i=0;i<url.length;i++) {
    	cont++;
        var aux = url[i].split("=");
        if (cont == 2) {
        	link +=  "/"+aux[1]+"/";	
        }else{
        	link +=  "/"+aux[1];
        }
        
    }
    return "http://localhost/SPORT_V1.6" + link;
}

function get_token(url){
    $url_split=url.split("/");
    return $url_split[6];
}