angular.module('AdminController', []).controller('AdminController', ['$scope', '$location', '$localStorage', 'User', 'Equipo', 'Torneo', 'Partido',
  function ($scope, $location, $localStorage, User, Equipo, Torneo, Partido) {
    /**
     * Responsible for highlighting the currently active menu item in the navbar.
     *
     * @param route
     * @returns {boolean}
     */
    $scope.isActive = function (route) {
      return route === $location.path();
    };

    /**
     * Query the authenticated user by the Authorization token from the header.
     *
     * @param user {object} If provided, it won't query from database, but take this one.
     * @returns {null}
     */
    $scope.getAuthenticatedUser = function (user) {
      if (user) {
        $scope.authenticatedUser = user;
        return;
      }

      if (typeof $localStorage.token === 'undefined') {
        return null;
      }

      new User().$getByToken(function (user) {
        $scope.authenticatedUser = user;
      }, function (err) {
        console.log(err);
      });
    };

    $scope.logout = function () {
      delete $localStorage.token;
      $scope.authenticatedUser = null;
    };

    $scope.getTeams = function () {

      $scope.teams = Equipo.query();

    }//end getTeams
    
    $scope.getTorneos = function () {

      $scope.torneos = Torneo.query();

    }//end getTorneos
    
    $scope.getOneTorneo = function(){
       var splitPath = $location.path().split('/');
      var torneoId = splitPath[splitPath.length - 1];
      $scope.torneo = Torneo.get({ torneoId: torneoId });
      
    }

    $scope.createTorneo = function () {
      var torneo = new Torneo($scope.torneo);
      torneo.$save(function (torneo) {
       $scope.sucess = "El torneo fue creado con éxito";
      }, function (err) {
        $scope.error = "Se produjo un error al crear el torneo";
        console.log(err);
      });
      
    }//End Create torneo

    $scope.createTeams = function () {
      $.ajax({
        url: "http://api.football-data.org/v1/competitions/440/teams",
        headers: {
          "X-Auth-Token": "29de3e65e4d84912ad46d8334beacc7c",
          "X-Response-Control": "minified"
        }
      }).done(function (teams) {
        for (var i = 0; i < teams.count; i++) {
          var team = {
            id_api: teams.teams[i].id,
            nombre: teams.teams[i].name,
            area: "UEFA",
            liga: "",
            imagen: teams.teams[i].crestUrl
          };
          var equipo = new Equipo(team);
          equipo.$save(function (team) {
            console.log("Guardado");
          }, function (err) {
            console.log(err);
          });
        }
      });
    } // end create Teams
    
    $scope.createPartidos = function (id) {
      $.ajax({
        url: "http://api.football-data.org/v1/competitions/"+id+"/fixtures",
        headers: {
          "X-Auth-Token": "29de3e65e4d84912ad46d8334beacc7c",
          "X-Response-Control": "minified"
        }
      }).done(function (match) {
        for (var i = 0; i < match.count; i++) {
          var oneMatch = {
            id_api: match.fixtures[i].id,
            team_a: match.fixtures[i].homeTeamName,
            team_b: match.fixtures[i].awayTeamName,
            fecha: match.fixtures[i].date,
            match_day: match.fixtures[i].matchday,
            torneo: match.fixtures[i].competitionId,
            goles_a: match.fixtures[i].result.goalsHomeTeam,
            goles_b: match.fixtures[i].result.goalsAwayTeam,
            ganador: null,
            estado: match.fixtures[i].status           
          };
          var partido = new Partido(oneMatch);
          partido.$save(function (partido) {
            console.log("Guardado");
          }, function (err) {
            console.log(err);
          });
        }
        $scope.message = "Se crearon " + match.count + " partidos."
      });
    } // end create Partidos


  }
]);
