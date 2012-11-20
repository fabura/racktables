<tr ng-app>
    <td>
        <div class="" id="taghistory">
            <div class="data" id="tab" ng-controller="TagHistoryCtrl">
                <table>
                    <thead>
                    <tr>
                        <th ng-click="sort('name')">Object</th>
                        <th ng-click="sort('tag')">Tag</th>
                        <th ng-click="sort('operation')">Operation</th>
                        <th ng-click="sort('date')">Date</th>
                        <th ng-click="sort('user')">User</th>
                    </tr>
                    </thead>
                    <tr ng-repeat="elem in tagHistory | orderBy:orderBy:reverse">
                        <td>
                            {{ elem.name }}
                        </td>
                        <td>
                            {{ elem.tag }}
                        </td>
                        <td>
                            {{ elem.operation }}
                        </td>
                        <td>
                            {{ elem.date }}
                        </td>
                        <td>{{ elem.user }}</td>
                    </tr>
                </table>
            </div>
            <div class="filters">
                <form action="/index.php?page=reports&tab=taghistory" method="POST">
                        <div id="tab">
                        <h2 align="center">Tags</h2>
                            <div id="tag_tree" class="filter" ng-controller="TagTreeCtrl">
                            <div ng-repeat="rootNode in tagTree" class="separator">
                                <div class="root-node  selected-{{rootNode.checked}}"><input type="checkbox" name="tag[{{rootNode.id}}]" ng-change="check(rootNode.id)"
                                       ng-model="rootNode.checked">

                                {{rootNode.tag}}</div>
                                <div ng-repeat="leaf in rootNode.kids" class="leaf-node selected-{{leaf.checked}}">
                                    <div><input type="checkbox" name="tag[{{leaf.id}}]" ng-model="leaf.checked">
                                    {{leaf.tag }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab">
                        <h2 align="center">Objects</h2>
                        <div id="object_filter" class="filter" ng-controller="ObjectsCtrl">
                            <div><input type="checkbox" ng-model="forall" ng-change="toggle()">For all</div>
                            <table>
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tr ng-repeat="object in objects">
                                    <td><input type="checkbox" ng-model="object.checked" name="object[{{object.id}}]"></td>
                                    <td>{{object.name}}</td>
                                    <td ng-show="rack(object.id)">
                                        <a href="/index.php?page=row&row_id={{rack(object.id).row_id}}">{{rack(object.id).row_name}}</a>/
                                        <a href="/index.php?page=rack&rack_id={{rack(object.id).rack_id}}">{{rack(object.id).rack_name}}</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                        <div id="filter_buttons" class="filter">
                            <h2 align="center">Date Range</h2>
                            <div id="date_filter" class="filter" ng-controller="DateCtrl">
                                <p><b>From:</b> <input type="text" name="dateFrom" value= <?php echo "0000-00-00";?> id="dateFrom"></p>
                                <p><b>To:</b> <input type="text" name="dateTo" value= <?php echo date('Y-m-d');?> id="dateTo"/></p>
                            </div>
                            <input type="submit" id="btnSubmit" value="Отправить!">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </td>
</tr>
<script type="text/javascript">
    arrays = {};
    arrays.tagTree = <?php global $tagtree;echo json_encode($tagtree);?>;
    arrays.objects = <?php echo json_encode($objects);?>;
    arrays.tagHistory = <?php echo json_encode($taghistory); ?>;
    arrays.mountinfo = <?php echo json_encode($mountinfo); ?>;
</script>
<script type="text/javascript" src="/js/additional/angular.js"></script>
<script type="text/javascript" src="/js/additional/controllers.js"></script>
<link rel="stylesheet" href="/css/additional/style.css">