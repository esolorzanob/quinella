angular.module('PrediccionService', []).factory('Prediccion', ['$resource',
  function ($resource) {
    return $resource('/api/prediccion/:prediccionId', {
      prediccionId: '@id',
      userId: '@userId'
    }, {
      update: {
        method: 'PUT'
      },
      getUserPredicciones: {
          method: 'Get',
          isArray: true,
          url: 'api/prediccion/:userId' 
      }
    });
  }
]);