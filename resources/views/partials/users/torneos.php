<div ng-controller="UserController" ng-init="findWithAuthenticate()">
   <div class="container" ng-show="show"> 
  
     <h1>Torneos Abiertos</h1>
    <br>
    <br>        
       <div class="form-horizontal" ng-repeat="torneo in torneos">
           <div class="form-group" ng-show="torneo.status == 'Abierto'">
                <div class="col-md-3">
                <a href="javascript:void(0)" ng-click="registrarTorneo(torneo.id)">
               <img class="logoTorneo" src="{{torneo.imagen}}">
             </a>
                </div>
            
           </div>   
      </div>     
      
       <div class="form-horizontal">
           <div class="form-group">
                <div class="col-md-6">
               
               <h3>Has click en un torneo para registrate</h3>
             
                </div>
            
           </div>   
      </div>     
        
     <p class="success">{{success}}</p>
     <p class="error">{{error}}</p>
    </div>
    
    <h1 class="error" ng-show="!show">{{message}}<h1>
    
</div>
