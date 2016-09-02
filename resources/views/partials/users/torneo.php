<div ng-controller="UserController" ng-init="getAll()">
   <div class="container">
       
       
       <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#Week1">Week 1</a></li>
  <li><a data-toggle="tab" href="#Week2">Week 2</a></li>
  <li><a data-toggle="tab" href="#Week3">Week 3</a></li>
   <li><a data-toggle="tab" href="#Week4">Week 4</a></li>
  <li><a data-toggle="tab" href="#Week5">Week 5</a></li>
  <li><a data-toggle="tab" href="#Week6">Week 6</a></li>
</ul>
 <div class="tab-content">
        <div class="form-horizontal" ng-repeat="partido in actualPartidos">
           
            <div  class="Week{{partido.match_day}} tab-pane" ng-show="partido.match_day == 1 ? active : NotActive" >
             <div class="form-group">
                <div class="col-md-3">
               <label class="fecha">Fecha: {{partido.fecha}}</label>
          
                </div>
            </div>
           <div class="form-group">
                <div class="col-md-1">
               <img class="logo" src="{{partido.teamAImage}}">
          
                </div>
             <div class="col-md-2" class="nombre">
            <label class="teamName">{{partido.team_a}}</label>
             </div>
             <div class="col-md-1" class="nombre">
            <label class="golesA">{{partido.goles_a != null ? partido.goles_a : 0 }}</label>
             </div>
             <div class="col-md-1" id="A{{partido.id}}">
            <input type="text" class="prediccion" ng-model="partido.prediccionA">
             </div>
              <div class="col-md-1" id="B{{partido.id}}">
            <input type="text" class="prediccion" ng-model="partido.prediccionB">
             </div>
              <div class="col-md-1" class="nombre">
            <label class="golesA">{{partido.goles_b != null ? partido.goles_b : 0 }}</label>
             </div>
               <div class="col-md-2" class="nombre">
            <label class="teamName">{{partido.team_b}}</label>
             </div>
               <div class="col-md-1">
               <img class="logo" src="{{partido.teamBImage}}">
          
                </div>
             
           </div>
           
           </div>
           </div>
      </div>       
       <button class="btn btn-primary" ng-click="guardarPredicciones()">Guardar</button>
       
    </div>
</div>
