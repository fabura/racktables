/**
 * Created with JetBrains PhpStorm.
 * User: bulat.fattahov
 * Date: 15.11.12
 * Time: 15:54
 */
angular.module('racktables_taghistory', []).
    filter('search', function () {
        return function (input, query) {
            var result = [];
            var regexp = new RegExp(query, 'ig');
            for (var index in input) {
                var obj = input[index];
                if (obj.hasOwnProperty("name")) {
                    if (regexp.test(obj.name)) {
                        result.push(obj);
                    }
                }

            }
            return result;
        }
    });

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

    var checkedObjects = [];
    const storedCheckedTags = arrays.filtervalues.tag  ? arrays.filtervalues.tag : 0;
    for (var i = 0; i < storedCheckedTags.length; i++) {
        checkedObjects[storedCheckedTags[i]] = true;
    }
    for (node in $scope.tagTree) {
        node = $scope.tagTree[node];
        node.checked = checkedObjects[node.id] ? true : false;
        for (kid in node.kids) {
            kid = node.kids[kid];
            kid.checked = checkedObjects[kid.id] ? true : false;
        }
    }

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
    $scope.query = arrays.filtervalues.query;

    $scope.rack = function (id) {

        var mountinfo = $scope.mountinfo[id];
        if (mountinfo) {
            return mountinfo[0];
        }
        else {
            return false;
        }
    };

    $scope.forall = arrays.filtervalues.forall === "on";
    $scope.toggle = function () {
        for (var i = 0; i < $scope.objects.length; i++) {
            $scope.objects[i].checked = $scope.forall;
        }
    };

    var checkedObjects = [];
    for (var i = 0; i < arrays.filtervalues.object; i++) {
        checkedObjects[arrays.filtervalues.object[i]] = true;
    }
    for (var i = 0; i < $scope.objects.length; i++) {
        var object = $scope.objects[i];
        object.checked = checkedObjects[object.id] ? true : false;
    }

//    $scope.toggle();
}

function DateCtrl($scope) {
}
