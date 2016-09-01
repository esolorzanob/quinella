angular.module('EquipoService', []).factory('Equipo', ['$resource',
  function ($resource) {
    return $resource('/api/equipo/:equipoId', {
      equipoId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);