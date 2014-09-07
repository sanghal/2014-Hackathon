(function(){
    slingo.Views = slingo.Views || {};

    slingo.Views.register = Backbone.View.extend({

        initialize: function(){
            this.render();
        },

        render: function(el) {
            if (el) {
                this.$el = el;
            }
            
            this.tpl = this.options.tpl;
            this.attrs = this.options.attrs;
            this.$el.html(_.template(this.tpl.registerTpl)(this.attrs));

            return this.$el;
        }
        
    });
})();