<div ng-controller="AdminController" ng-init="getTorneos()">
    <h1>Administrar Torneos</h1>
    <br>
    <br>
   <div class="container">
       
       <div class="form-horizontal" ng-repeat="torneo in torneos">
           <div class="form-group">
                <div class="col-md-3">
                <a href="admin/editTorneo/{{torneo.id}}">
               <img class="logoTorneo" src="{{torneo.imagen}}">
             </a>
                </div>
            
           </div>
      </div>
       
       
    </div>
</div>
