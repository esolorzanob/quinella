<form name="torneoForm" ng-controller="AdminController" ng-submit="createTorneo()"
      class="form-horizontal" novalidate>
    <div class="form-group">
         <div class="col-md-2">
            
            <label>Nombre:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="nombre" ng-model="torneo.nombre"
                   class="form-control" placeholder="">
        </div>
    </div>
    
    <div class="form-group">
         <div class="col-md-2">
            
            <label>URL de imagen:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="imagen" ng-model="torneo.imagen"
                   class="form-control" placeholder="">
        </div>
    </div>
    
    <div class="form-group">
         <div class="col-md-2">
            
            <label>ID del API:</label>
          
        </div>
        <div class="col-md-3">
             <input type="text" id="id_api" ng-model="torneo.id_api"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
               
            <label>Area:</label>
          
        </div>
        <div class="col-md-3">
             <input type="text" id="area" ng-model="torneo.area"
                   class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group">
         <div class="col-md-2">
              
            <label>Año:</label>
          
        </div>
        <div class="col-md-3">
            <input type="text" id="anno" ng-model="torneo.anno"
                   class="form-control" placeholder="">
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </div>
    <p class="success">{{sucess}}</p>
    <p class="error">{{error}}</p>
</form>
