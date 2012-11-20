/**
 * Created with JetBrains PhpStorm.
 * User: bulat.fattahov
 * Date: 15.11.12
 * Time: 15:54
 */
function TagHistoryCtrl($scope) {
    $scope.tagHistory = arrays.tagHistory;

    $scope.orderBy = "name";
    $scope.reverse = false;
    $scope.sort = function (field) {
        if ($scope.orderBy == field) {
            $scope.reverse = !$scope.reverse;
        }
        else {
            $scope.orderBy = field;
            $scope.reverse = false;
        }
    }
}

function TagTreeCtrl($scope) {
    $scope.tagTree = arrays.tagTree;

    $scope.check = function (nodeId) {
        for (node in $scope.tagTree) {
            node = $scope.tagTree[node];
            if (nodeId == node.id) {
                for (kid in node.kids) {
                    kid = node.kids[kid];
                    kid.checked = node.checked;
                }
                break;
            }
        }
    }
}

function ObjectsCtrl($scope) {
    $scope.objects = arrays.objects;
    $scope.mountinfo = arrays.mountinfo;

    $scope.rack = function (id) {

        var mountinfo = $scope.mountinfo[id];
        if (mountinfo) {
            return mountinfo[0];
        }
        else {
            return false;
        }
    };

    $scope.forall = true;
    $scope.toggle = function(){
        for(var i = 0; i <  $scope.objects.length; i++){
            $scope.objects[i].checked = $scope.forall;
        }
    };
    $scope.toggle();
}

function DateCtrl($scope) {
}
