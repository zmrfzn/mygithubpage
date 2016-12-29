app.factory('newsFeedService', ['$http', function($http) {
    var url = 'https://newsapi.org/v1/articles?source=techcrunch&sortBy=latest&apiKey=dc0211e2c3a54f2d903051ed35e789e0';
    return $http.get(url)
    .success(function(feeds){
    	return feeds;
    })
    .error(function(error){
    	return error;
    })
}])
