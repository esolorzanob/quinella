angular.module('UserHasTorneoService', []).factory('UserHasTorneo', ['$resource',
  function ($resource) {
    return $resource('/api/userHasTorneo/:userHasTorneoId', {
      userHasTorneoId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);