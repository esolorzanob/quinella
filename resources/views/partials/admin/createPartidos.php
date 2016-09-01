<div ng-controller="AdminController" ng-init="getOneTorneo()">
   <div class="container">
       
       <div class="form-horizontal" >
           <div class="form-group">
                <div class="col-md-1">
               <img class="logoTorneo" src="{{torneo.imagen}}">          
                </div>           
           </div>
      </div>
        <div class="form-horizontal" >
           <div class="form-group">
                <div class="col-md-5">
                <h2>Crear todos los partidos<h2>
                <button class="btn btn-primary" ng-click="createPartidos(torneo.id_api)">Crear</button>         
                </div>           
           </div>
      </div>
        <div class="form-horizontal" >
           <div class="form-group">
                <div class="col-md-5">
               <h3 class="success">{{message}}</h3>         
                </div>           
           </div>
      </div>
     
      
       
    </div>
</div>
