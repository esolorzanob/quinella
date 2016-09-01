angular.module('PartidoService', []).factory('Partido', ['$resource',
  function ($resource) {
    return $resource('/api/partido/:partidoId', {
      partidoId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);