(function(){
    slingo.Views = slingo.Views || {};

    slingo.Views.header = Backbone.View.extend({

        initialize: function() {
            this.tpl = this.options.tpl;
            this.user = this.options.user;
            this.deferred = $.Deferred();
            this.render();
        },

        render: function() {
            this.$el.html(_.template(this.tpl.headerTpl)());
            this.init();
            this.delegateEvents();
            return this.el;
        },

        init: function() {

        },

        events: {
            'click #houses': 'houses',
            'click #dashboard': 'dashboard',
            'click #payment': 'payment'
        },

        dashboard: function(ev) {
            ev.preventDefault();
            slingo.Router.navigate('dashboard', { trigger: true });
        },

        
        houses: function(ev) {
            ev.preventDefault();
            slingo.Router.navigate('houses', { trigger: true });
        },

        payment: function(ev) {
            ev.preventDefault();
            slingo.Router.navigate('payment', { trigger: true });
        }
    });
})();