(function(){
    slingo.Collections = slingo.Collections || {};

    slingo.Collections.users = Backbone.Collection.extend({

        url: slingo.API_ENDPOINT,
        model: slingo.Models.user

    });
})();