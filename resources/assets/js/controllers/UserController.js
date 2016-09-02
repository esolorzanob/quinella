angular.module('UserController', []).controller('UserController', ['$scope', 'User', '$localStorage', '$location', 'Torneo', 'Partido', 'UserHasTorneo', 'Equipo', 'Prediccion',
  function ($scope, User, $localStorage, $location, Torneo, Partido, UserHasTorneo, Equipo, Prediccion) {
    $scope.userTorneos = [];

    $scope.active = true;
    $scope.NotActive = false;

    $('ul.nav li').click(function (e) {
      e.preventDefault();
      var id = $(this).text().replace(/\s/g, "");
      $('div.tab-pane').each(function () {
        $(this).attr('ng-show', $scope.NotActive);
        if (!$(this).attr('class').match('ng-hide')) {
          $(this).toggleClass('ng-hide');
        }

      });
      $('div.' + id).each(function () {
        $(this).attr('ng-show', $scope.active);
        if ($(this).attr('class').match('ng-hide')) {
          $(this).toggleClass('ng-hide');
        }

      })

    });




    $scope.login = function () {
      var user = new User({
        username: this.username,
        password: this.password
      });
      user.$login(function (user) {
        $localStorage.token = user.token;
        $scope.getAuthenticatedUser(user);
        if (user.username == 'Admin') {
          $location.path('admin/adminMenu/' + user.id);
        } else {
          $location.path('users/view/' + user.id);
        }

      }, function (err) {
        console.log(err);
      });
    };

    $scope.create = function () {
      if (this.password != this.passwordConfirmation) {
        return alert('The passwords do not match.');
      }
      var user = new User({
        username: this.username,
        password: this.password,
        email: this.email
      });
      user.$save(function (user) {
        $localStorage.token = user.token;
        $scope.getAuthenticatedUser(user);
        $location.path('users/view/' + user.id);
      }, function (err) {
        console.log(err);
      });
    };

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.user = User.get({ userId: userId });
    };

    $scope.getUser = function () {
      new User().$getByToken(function (user) {
        $scope.authenticatedUser = user;
      }, function (err) {
        console.log(err);
      });
    }

    $scope.findWithAuthenticate = function () {
      $scope.getUser();
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: userId }, function (user) {
        if ($scope.authenticatedUser.username != "Admin" && $scope.authenticatedUser.id != user.id) {
          $scope.show = false;
          $scope.message = "No esta autorizado para ver esta información."

        } else {
          $scope.getUserHasTorneo();
          $scope.show = true;

        }

      });
    } // end findWithAuthenticate

    $scope.getTeams = function () {

      $scope.teams = Equipo.query();

    }//end getTeams

    $scope.getTorneos = function () {

      $scope.torneos = Torneo.query();

    }//end getTorneos

    $scope.getUserHasTorneo = function () {
      UserHasTorneo.query({}, function (torneos) {
        for (var i = 0; i < torneos.length; i++) {
          if (torneos[i].idUser == $scope.authenticatedUser.id) {
            $scope.userTorneos.push(Torneo.get({ torneoId: torneos[i].idTorneo }));
          }
        }
      });
    }

    $scope.registrarTorneo = function (id) {
      var count = 0;
      UserHasTorneo.query({}, function (torneos) {
        for (var i = 0; i < torneos.length; i++) {
          if (torneos[i].idTorneo == id && torneos[i].idUser == $scope.authenticatedUser.id) {
            count++;
          }
        }
        if (count == 0) {
          var hasTorneo = new UserHasTorneo({
            idTorneo: id,
            idUser: $scope.authenticatedUser.id,
            puntosTotal: 0
          });
          hasTorneo.$save(function (hasTorneo) {
            $scope.success = "Se ha registrado con éxito";
          }, function (err) {
            $scope.error = "Se produjo un error al registrarse";
            console.log(err);
          });
        } else {
          $scope.error = "Ya está registrado en ese torneo";
        }
      });

    } //end registrarTorneo

    $scope.testPredicciones = function () {

    }

    $scope.getAll = function () {
      var splitPath = $location.path().split('/');
      $scope.torneoId = splitPath[splitPath.length - 1];
      $scope.getUser();
      Equipo.query({}, function (teams) {
        Partido.query({}, function (partidos) {
          var partidosTemp = partidos.filter(function (e) {
            return e.torneo == $scope.torneoId;
          });
          partidosTemp = partidosTemp.map(function (e) {
            for (var i = 0; i < teams.length; i++) {
              if (teams[i].nombre == e.team_a) {
                e.teamAImage = teams[i].imagen;
              }
              if (teams[i].nombre == e.team_b) {
                e.teamBImage = teams[i].imagen;
              }
            }
            return e;
          });
          $scope.actualPartidos = partidosTemp;

        });
      });

    } // end getAll

    $scope.guardarPredicciones = function () {
      for (var i = 0; i < 3; i++) {
        var prediccion = new Prediccion({
          idUser: $scope.authenticatedUser.id,
          idPartido: $scope.actualPartidos[i].id,
          idTorneo: $scope.torneoId,
          goles_a: $scope.actualPartidos[i].prediccionA,
          goles_b: $scope.actualPartidos[i].prediccionB,
          puntos: 0
        });
        
       
        prediccion.$save(function (prediccion) {
          $scope.success = "Se ha registrado con éxito";
        }, function (err) {
          $scope.error = "Se produjo un error al registrarse";
          console.log(err);
        });
        
      }
    }

  }//end main
]);
