(function(){
    slingo.Views = slingo.Views || {};

    slingo.Views.application = Backbone.View.extend({

        el: '#main',

        initialize: function(options) {
            this.tpl = new slingo.Views.template();
            this.dfd = $.Deferred();
            this.dfd2 = $.Deferred();
            this.isDfd = false;
            this.user = new slingo.Models.user();
        
        },

        events: {
            'click #login': 'login',
            'click #newregister' : 'newregister'

        },

        login: function(ev) {
            ev.preventDefault();
            slingo.Router.navigate('dashboard', { trigger: true });
        },

        newregister: function(ev) {
            ev.preventDefault();
            slingo.Router.navigate('newregister', { trigger: true });
        },

        renderRegister: function() { 
            var _this = this;
            if (!this.bodyContainer) {
                this.isDfd = true;
                this.dfd.promise(this.renderHome()).done(function(data) {

                    /* new view */

                    if (!_this.register) {
                        _this.register = new slingo.Views.register({ el: _this.bodyContainer, tpl: _this.tpl });
                    } else {
                        _this.register.render(_this.bodyContainer);
                    }

                });
            } else {
                this.isDfd = true;
                
                if (!_this.register) {
                    this.register = new slingo.Views.register({ el: this.bodyContainer, tpl: this.tpl});
                } else {
                    this.register.render(this.bodyContainer);
                }
            }
        },

        renderDashboard: function() { 
            var _this = this;
            
            if (!this.bodyContainer) {
                this.isDfd = true;
                this.dfd.promise(this.renderDashboard()).done(function(data) {

                    /* new view */

                    if (!_this.houses) {
                        _this.dashboard = new slingo.Views.dashboard({ el: _this.bodyContainer, tpl: _this.tpl });
                    } else {
                        _this.dashboard.render(_this.bodyContainer);
                    }

                });
            } else {
                this.isDfd = true;
                
                if (!_this.dashboard) {
                    this.dashboard = new slingo.Views.dashboard({ el: this.bodyContainer, tpl: this.tpl});
                } else {
                    this.dashboard.render(this.bodyContainer);
                }
            }
        },

        renderHouses: function() { 
            var _this = this;
            
            if (!this.bodyContainer) {
                this.isDfd = true;
                this.dfd.promise(this.renderHome()).done(function(data) {

                    /* new view */

                    if (!_this.houses) {
                        _this.houses = new slingo.Views.houses({ el: _this.bodyContainer, tpl: _this.tpl });
                    } else {
                        _this.houses.render(_this.bodyContainer);
                    }

                });
            } else {
                this.isDfd = true;
                
                if (!_this.houses) {
                    this.houses = new slingo.Views.houses({ el: this.bodyContainer, tpl: this.tpl});
                } else {
                    this.houses.render(this.bodyContainer);
                }
            }
        },



        renderPayment: function() { 
            var _this = this;
            
            if (!this.bodyContainer) {
                this.isDfd = true;
                this.dfd.promise(this.renderHome()).done(function(data) {

                    /* new view */

                    if (!_this.payment) {
                        _this.payment = new slingo.Views.payment({ el: _this.bodyContainer, tpl: _this.tpl });
                    } else {
                        _this.payment.render(_this.bodyContainer);
                    }

                });
            } else {
                this.isDfd = true;
                
                if (!_this.payment) {
                    this.payment = new slingo.Views.payment({ el: this.bodyContainer, tpl: this.tpl});
                } else {
                    this.payment.render(this.bodyContainer);
                }
            }
        },


        renderHeader: function() {
            this.header.render();
        },

        init: function() {
            this.bodyContainer = this.$('#body');

            if (!this.header) {
                this.header = new slingo.Views.header({ el: '#header', tpl: this.tpl }); 
            } else {
                this.$('#header').html(this.header.render());
            }
            
        },

        renderHome: function() {
            
            this.$el.html(_.template(this.tpl.applicationTpl)());
            this.init();
        },

        load: function(view, options) {
            var _this = this;
            slingo.Router.navigate('/');
            _this.renderHome();

        }

       



    });
})();