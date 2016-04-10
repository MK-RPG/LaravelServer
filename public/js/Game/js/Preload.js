var TopDownGame = TopDownGame || {};


TopDownGame.Preload = function(){};

TopDownGame.Preload.prototype = {
  preload: function() {
    //show loading screen
    this.preloadBar = this.add.sprite(this.game.world.centerX, this.game.world.centerY, 'preloadbar');
    this.preloadBar.anchor.setTo(0.5);

    this.load.setPreloadSprite(this.preloadBar);

    //load game assets
    this.load.tilemap('maze', 'js/Game/assets/tilemaps/maze.json', null, Phaser.Tilemap.TILED_JSON);
    this.load.tilemap('dungeon', 'js/Game/assets/tilemaps/dungeonLast.json', null, Phaser.Tilemap.TILED_JSON);

    this.load.image('gameTiles', 'js/Game/assets/images/tileset.png');
    this.load.image('dungeonTile', 'js/Game/assets/images/tilesDun.png');
    this.load.image('greencup', 'js/Game/assets/images/greencup.png');
    this.load.image('bluecup', 'js/Game/assets/images/bluecup.png');
    this.load.image('sword', 'js/Game/assets/images/sword.png');
    this.load.spritesheet('player', 'js/Game/assets/images/player.png', 32, 48);
    this.load.image('browndoor', 'js/Game/assets/images/browndoor.png');
    this.load.image('watch', 'js/Game/assets/images/watch.png');
    this.load.image('treasure', 'js/Game/assets/images/treasure.png');
    this.load.image('startScreen', 'js/Game/assets/images/maze2.png');
    this.load.image('winner', 'js/Game/assets/images/win.png')
    this.load.image('gameOverScreen', 'js/Game/assets/images/over.png');
    
    //sounds
    this.load.audio('collect', 'js/Game/assets/audio/coin.mp3');
    this.load.audio('winner', 'js/Game/assets/audio/win.wav');
    this.load.audio('time', 'js/Game/assets/audio/time.wav');
    this.load.audio('village', 'js/Game/assets/audio/village.wav');
    this.load.audio('dungeonSound', 'js/Game/assets/audio/dungeon.wav');
    
  },
  create: function() {
    this.state.start('StartMenu');
  }
};