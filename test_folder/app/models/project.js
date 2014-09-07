(function(){
    slingo.Models = slingo.Models || {};

    slingo.Models.project = Backbone.Model.extend({

        idAttribute: 'projectID',
        defaults: {
            name: '',
            projectID: '',
            file: '',
            displayName: '',
            permissions: [],
            id: ''
        },

        initialize: function() {
            // what ever you want to do when the model is created
        }

    });
})();