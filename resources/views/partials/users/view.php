<div ng-controller="UserController" ng-init="findWithAuthenticate()">
   <div class="container" ng-show="show"> 
  
     <h1>Mis Torneos</h1>
    <br>
    <br>        
       <div class="form-horizontal" ng-repeat="torneo in userTorneos">
           <div class="form-group">
                <div class="col-md-3">
                <a href="users/torneo/{{torneo.id_api}}">
               <img class="logoTorneo" src="{{torneo.imagen}}">
             </a>
                </div>
            
           </div>   
      </div>     
      
       <div class="form-horizontal">
           <div class="form-group">
                <div class="col-md-3">
                <a href="/users/torneos/{{authenticatedUser.id}}">
               <h3>Registrarme a un torneo</h3>
             </a>
                </div>
            
           </div>   
      </div>     
        
       
    </div>
    
    <h1 class="error" ng-show="!show">{{message}}<h1>
    
</div>
