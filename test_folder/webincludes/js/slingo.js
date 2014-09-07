(function(){


    Backbone.View.prototype.getTemplate = function(url) {
        var deferred = $.Deferred();
        
        var req = function() {
            $.ajax({
                url: url,
                cache: true,
                type: 'GET',
                success: function(data) {
                    deferred.resolve(_.template(data));
                }
            });
        }
        return deferred.promise(req());
    };

    Backbone.Collection.prototype.toJSONObject = function() {
        return $.map(this.models, function(model) {
            return model.toJSON();
        })
    };

    slingo.Views = slingo.Views || {};

    slingo.Views.template = Backbone.View.extend({
        el: 'body',

        initialize: function() {
            this.applicationTpl = this.$('#application_tpl').html();
            this.loginTpl = this.$('#login_tpl').html();
            this.headerTpl = this.$('#header_tpl').html();
            this.housesTpl = this.$('#houses_tpl').html();
            this.paymentTpl = this.$('#payment_tpl').html();
            this.registerTpl = this.$('#register_tpl').html();
            this.dashboardTpl = this.$('#dashboard_tpl').html();
            
        }
    })

})();