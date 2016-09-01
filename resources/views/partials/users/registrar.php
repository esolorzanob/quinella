<div ng-controller="UserController" ng-init="getTorneos()">
    <h1>Torneos Activos</h1>
    <br>
    <br>
   <div class="container">
       
       <div class="form-horizontal" ng-repeat="torneo in torneos">
           <div class="form-group">
                <div class="col-md-3">
               
               <img class="logoTorneo" src="{{torneo.imagen}}">
             
                </div>
            
           </div>
      </div>
       
       
    </div>
</div>
