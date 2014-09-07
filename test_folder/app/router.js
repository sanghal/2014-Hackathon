(function(){
    var slingoRouter = Backbone.Router.extend({
        routes: {
            '': 'login',
            'houses': 'houses',
            'payment': 'payment',
            'dashboard' : 'dashboard',
            'newregister' : 'newregister'
        },

        newregister: function() {
            console.log("register");
            if (!this.application) {
                this.application = new slingo.Views.application();
                this.application.load('renderRegister');
            } else {
                this.application.renderRegister();
            }
        },

        dashboard: function() {
            console.log("dashboard");
            if (!this.application) {
                this.application = new slingo.Views.application();
                this.application.load('renderDashboard');
            } else {
                this.application.renderDashboard();
            }
        },

        login: function() {
            if (!this.application) {
                this.application = new slingo.Views.application();
                this.application.load('renderHome');
            } else {
                this.application.renderHome();
            }
        },

        houses: function() {
            if (!this.application) {
                this.application = new slingo.Views.application();
                this.application.load('renderHouses');
            } else {
                this.application.renderHouses();
            }
        },

        payment: function() {
            if (!this.application) {
                this.application = new slingo.Views.application();
                this.application.load('renderPayment');
            } else {
                this.application.renderPayment();
            }
        }
    });

    slingo.Router = new slingoRouter();
    Backbone.history.start();
})();