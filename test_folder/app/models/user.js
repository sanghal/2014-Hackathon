(function(){
    slingo.Models = slingo.Models || {};

    slingo.Models.user = Backbone.Model.extend({

        idAttribute: 'userID',
        defaults: {
            flags: '',
            globalAdmin: false,
            points: '',
            userID: '',
            username: ''
        },

        initialize: function() {
            // what ever you want to do when the model is created
        }

    });
})();