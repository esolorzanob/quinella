angular.module('UserController', []).controller('UserController', ['$scope', 'User', '$localStorage', '$location', 'Torneo', 'Partido', 'UserHasTorneo',
  function ($scope, User, $localStorage, $location, Torneo, Partido, UserHasTorneo) {
    $scope.userTorneos = [];

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
    }

    $scope.getTeams = function () {

      $scope.teams = Equipo.query();

    }//end getTeams

    $scope.getTorneos = function () {

      $scope.torneos = Torneo.query();

    }//end getTorneos

    $scope.getUserHasTorneo = function () {
      UserHasTorneo.query({},function(torneos){
         for (var i = 0; i < torneos.length; i++) {
          if (torneos[i].idUser == $scope.authenticatedUser.id) {
            $scope.userTorneos.push(Torneo.get({ torneoId: torneos[i].idTorneo}));
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
        }else{
          $scope.error = "Ya está registrado en ese torneo";
        }
      });

    }

  }//end main
]);
