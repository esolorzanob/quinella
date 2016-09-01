<div ng-controller="AdminController" ng-init="getTeams()">
   <div class="container">
       
       <div class="form-horizontal" ng-repeat="team in teams">
           <div class="form-group">
                <div class="col-md-1">
               <img class="logo" src="{{team.imagen}}">
          
                </div>
             <div class="col-md-3" class="nombre">
            <label >{{team.nombre}}</label>
             </div>
           </div>
      </div>
       
       
    </div>
</div>
