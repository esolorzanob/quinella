angular.module('TorneoService', []).factory('Torneo', ['$resource',
  function ($resource) {
    return $resource('/api/torneo/:torneoId', {
      torneoId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);