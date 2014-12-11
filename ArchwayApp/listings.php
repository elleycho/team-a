<!DOCTYPE html>
<html lang="en">

  <head>
    <script data-require="angular.js@*" data-semver="1.3.0-rc2" src="https://code.angularjs.org/1.3.0-rc.2/angular.js"></script>
    <script data-require="angular-resource@*" data-semver="1.2.14" src="http://code.angularjs.org/1.2.14/angular-resource.js"></script>
    <script data-require="ng-table@*" data-semver="0.3.0" src="http://bazalt-cms.com/assets/ng-table/0.3.0/ng-table.js"></script>
    <script data-require="bootstrap@*" data-semver="3.2.0" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.js"></script>
    
    
    
    <script type="text/javascript" src="../wp-content/plugins/ArchwayApp/archApp.js"></script>
    <!--link data-require="bootstrap@*" data-semver="3.2.0" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css" /-->
    <link data-require="bootstrap@*" rel="stylesheet" href="../wp-content/plugins/ArchwayApp/media/boostrap/css/bootstrap.css" />
    <link data-require="ng-table@*" data-semver="0.3.0" rel="stylesheet" href="http://bazalt-cms.com/assets/ng-table/0.3.0/ng-table.css" />
    <link rel="stylesheet" href="../wp-content/plugins/ArchwayApp/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body ng-app="archApp" ng-controller="DemoCtrl">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table ng-table="tableParams" show-filter="true" class="table">
            <tbody>
              <tr ng-repeat="resource in $data" ng-class-odd="'odd'" ng-class-even="'even'">
                <td data-title="'Agency Type'" filter="{ 'progType': 'select' }" filter-data="progTypes($column)">{{resource.progType}}</td>
              </tr>
            </tbody>
          </table>
        <!-- </div>
        <div class="col-md-9">
				                                                   <table ng-table class="table">
					<tr ng-repeat="user in users">
						<td data-title="'Name'">{{user.name}}</td>
						<td data-title="'Age'">{{user.age}}</td>
					</tr>
				</table> -->
          <button ng-click="tableParams.sorting({})" class="btn btn-default pull-right">Clear sorting</button>
          <p>
            <strong>Page:</strong>

 {{tableParams.page()}}</p>
          <p>
            <strong>Count per page:</strong>

 {{tableParams.count()}}</p>

			    {{checkboxes.items}}
				  <table ng-table="tableParams" show-filter="true" class="table">
            <tbody>
              <tr ng-repeat="resource in $data" ng-class-odd="'odd'" ng-class-even="'even'">
                <td width="30" style="text-align: left" header="'ng-table/headers/checkbox.html'">
                  <input type="checkbox" ng-model="checkboxes.items[user.id]" /></td>
                <td data-title="'Agency Name'" sortable="'agencyOrg'">{{resource.agencyOrg}}</td>
                <td data-title="'Program Type'" sortable="'progType'">{{resource.progType}}</td>
                <td data-title="'Address'">{{resource.orgAddress}}</td>
                <td data-title="'Contact Number'">{{resource.orgNum}}</td>
                <td data-title="'Contact Person'">{{resource.orgContact}}</td>
                <td data-title="'Website'">{{resource.orgWeb}}</td>
                <td data-title="'Operation Hours'" sortable="'orgHours'">{{resource.orgHours}}</td>
                <td data-title="'Purpose'">{{resource.orgPurpose}}</td>
                <td data-title="'Mission'">{{resource.orgMission}}</td>
                <td data-title="'Services'">{{resource.orgServices}}</td>
                <td data-title="'Eligilibity'">{{resource.orgElig}}</td>
                <td data-title="'Service Area'" sortable="'orgServes'">{{resource.orgServes}}</td>
                <td data-title="'Fees'" sortable="''">{{resource.orgFees}}</td>
              </tr>
            </tbody>
          </table>
          <script type="text/ng-template" id="ng-table/headers/checkbox.html">
			        <input type="checkbox" ng-model="checkboxes.checked" id="select_all" name="filter-checkbox" value="" />
			    </script>
          <script type="text/ng-template" id="custom/pager">
			        <ul class="pager ng-cloak">
			          <li ng-repeat="page in pages"
			                ng-class="{'disabled': !page.active, 'previous': page.type == 'prev', 'next': page.type == 'next'}"
			                ng-show="page.type == 'prev' || page.type == 'next'" ng-switch="page.type">
			            <a ng-switch-when="prev" ng-click="params.page(page.number)" href="">&laquo; Previous</a>
			            <a ng-switch-when="next" ng-click="params.page(page.number)" href="">Next &raquo;</a>
			          </li>
			            <li> 
			            <div class="btn-group">
			                <button type="button" ng-class="{'active':params.count() == 10}" ng-click="params.count(10)" class="btn btn-default">10</button>
			                <button type="button" ng-class="{'active':params.count() == 25}" ng-click="params.count(25)" class="btn btn-default">25</button>
			                <button type="button" ng-class="{'active':params.count() == 50}" ng-click="params.count(50)" class="btn btn-default">50</button>
			                <button type="button" ng-class="{'active':params.count() == 100}" ng-click="params.count(100)" class="btn btn-default">100</button>
			            </div>
			            </li>
			        </ul>
			    </script>
        </div>
      </div>
    </div>
  </body>

</html>
