TopDownGame.Win = function(game) {
    this.winner;
}

TopDownGame.Win.prototype = {

    create: function() {
        this.winner = this.add.image(0, 0, 'winner');
        this.winner.scale.setTo(0.667,0.667);
        this.winner.inputEnabled = true;
        this.winner.events.onInputDown.addOnce(this.showStartMenu, this);
    },

    showStartMenu: function(pointer) {
        this.state.start('StartMenu');
    }
}