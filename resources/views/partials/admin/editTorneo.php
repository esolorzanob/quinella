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
                <div class="col-md-3">
               <h3><a href="/admin/createPartidos/{{torneo.id}}">Crear Partidos</a></h3>          
                </div>           
           </div>
      </div>
      
       <div class="form-horizontal" >
           <div class="form-group">
                <div class="col-md-3">
               <h3><a href="/admin/evaluar/{{torneo.id}}">Evaluar Marcadores</a></h3>          
                </div>           
           </div>
      </div>
       
    </div>
</div>
