myapp.controller('MainController', ['$scope', function($scope, ngProgressFactory) {
    $scope.progressbar = ngProgressFactory.createInstance();
    $scope.progressbar.start();
    var inc = 5;
    var cond =0;
    while(cond){


    	// $scope.progressbar.stop();

    	if(inc<=50){
    	$scope.progressbar.set(inc);
    	}
    }

}]);
