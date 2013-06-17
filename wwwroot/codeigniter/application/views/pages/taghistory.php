<tr ng-app="racktables_taghistory">
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
                        <th ng-click="sort('asset_no')">Asset</th>
                    </tr>
                    </thead>
                    <tr ng-repeat="elem in tagHistory | orderBy:orderBy:reverse"
                        class="{{ elem.operation == '+' && 'row_plus' || 'row_minus'  }}">
                        <td>
                            {{ elem.name }}
                        </td>
                        <td>
                            {{ elem.tag }}
                        </td>
                        <td style="text-align: center; font-weight: bolder; font-size: larger">
                            {{ elem.operation }}
                        </td>
                        <td>
                            {{ elem.date }}
                        </td>
                        <td>{{ elem.user }}</td>
                        <td>{{ elem.asset_no }}</td>
                    </tr>
                </table>
            </div>
            <div class="filters">
                <form action="/index.php?page=reports&tab=taghistory" method="POST">
                    <input type="submit" id="btnSubmit" value="Filter!">
                    <div id="tags_filter_tab" class="filter_panel">
                        <div id="filter_buttons">
                            <h2 align="center">Date Range</h2>

                            <div id="date_filter" class="filter" ng-controller="DateCtrl">
                                <p><b>From:</b> <input type="text" name="dateFrom"
                                                       value= <?php echo "2000-01-01"; ?> id="dateFrom">
                                </p>

                                <p><b>To:</b> <input type="text" name="dateTo" value= <?php echo date('Y-m-d'); ?> id="dateTo"/>
                                </p>
                            </div>
                        </div>
                        <div>

                            <h2 align="center">Tags</h2>

                            <div id="tag_tree" class="filter" ng-controller="TagTreeCtrl">
                                <div ng-repeat="rootNode in tagTree" class="separator">
                                    <div class="root-node  selected-{{rootNode.checked}}"><input type="checkbox"
                                                                                                 name="tag[{{rootNode.id}}]"
                                                                                                 ng-change="check(rootNode.id)"
                                                                                                 ng-model="rootNode.checked">

                                        {{rootNode.tag}}
                                    </div>
                                    <div ng-repeat="leaf in rootNode.kids " class="leaf-node selected-{{leaf.checked}}">
                                        <div><input type="checkbox" name="tag[{{leaf.id}}]" ng-model="leaf.checked">
                                            {{leaf.tag }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="object_filter_tab" class="filter_panel">
                        <h2 align="center">Objects</h2>

                        <div id="object_filter" class="filter" ng-controller="ObjectsCtrl">
                            Filter : <input name="query" ng-model="query">

                            <div><input name="forall" type="checkbox" ng-model="forall" ng-change="toggle()">For all
                            </div>
                            <table>
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tr ng-repeat="object in objects | search: query">
                                    <td><input type="checkbox" ng-model="object.checked" name="object[{{object.id}}]">
                                    </td>
                                    <td>{{object.name}}</td>
                                    <td ng-show="rack(object.id)">
                                        <a href="/index.php?page=row&row_id={{rack(object.id).row_id}}">{{rack(object.id).row_name}}</a>/
                                        <a href="/index.php?page=rack&rack_id={{rack(object.id).rack_id}}">{{rack(object.id).rack_name}}</a>
                                    </td>
                                </tr>
                            </table>
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
    arrays.filtervalues =
    <?php echo json_encode($filtervalues);?>
</script>
<script type="text/javascript" src="/js/additional/angular.js"></script>
<script type="text/javascript" src="/js/additional/controllers.js"></script>
<link rel="stylesheet" href="/css/additional/style.css">