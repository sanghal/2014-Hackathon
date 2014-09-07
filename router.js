(function(){
    var houseRouter = Backbone.Router.extend({
        routes: {
            '': 'login',
            'dashboard': 'dashboard',
            'payment': 'payment',
        },

        login: function() {
            if (!this.application) {
                this.application = new house.Views.application();
                this.application.load('renderLogin');
            } else {
                this.application.renderLogin();
            }
        },

        dashboard: function() {
            if (!this.application) {
                this.application = new house.Views.application();
                this.application.load('renderDashboard');
            } else {
                this.application.renderDashboard();
            }
        },

        payment: function() {
            if (!this.application) {
                this.application = new house.Views.application();
                this.application.load('renderDashboard');
            } else {
                this.application.renderPayment();
            }
        }
    });

    house.Router = new houseRouter();
    Backbone.history.start();
})();