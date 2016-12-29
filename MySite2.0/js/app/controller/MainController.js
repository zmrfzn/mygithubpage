app.controller('MainController', ['$scope', 'newsFeedService', function($scope, newsFeedService) {
	
   newsFeedService.success(function(feeds){
   	$scope.feeds = feeds['articles'];
   });
}]);
