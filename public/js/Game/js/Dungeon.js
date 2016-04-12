  var TopDownGame = TopDownGame || {};


TopDownGame.Dungeon = function(){
  
  this.timerText;
    this.timerImage;
    this.seconds = 60;
    this.music;
};

TopDownGame.Dungeon.prototype = {
  create: function() {
    
    
this.music = {};
this.music.backgroundSound = this.game.add.audio('dungeonSound');
this.music.collectCoin = this.game.add.audio('collect');
this.music.collectTime = this.game.add.audio('time');

this.music.backgroundSound.play();
    
  var _this = this;
    
    this.map = this.game.add.tilemap('dungeon');

    this.map.addTilesetImage('dungeon', 'dungeonTile');

    this.backgroundlayer = this.map.createLayer('backgroundLayer');
    
    this.backgroundlayer.resizeWorld();
    
    this.blockedLayer = this.map.createLayer('blockedLayer');

    //collision on blockedLayer
    this.map.setCollisionBetween(1, 2000, true, 'blockedLayer');
    
      
    this.createItems();
    this.createDoors();
    this.createEnemy();

    //create player
    var result = this.findObjectsByType('playerStart', this.map, 'objectsLayer')
    this.player = this.game.add.sprite(result[0].x, result[0].y, 'player');
    this.player.frame=12;
    this.player.animations.add('up', [12, 13, 14, 15], 10, true);
    this.player.animations.add('bottom', [0, 1, 2, 3], 10, true);
    this.player.animations.add('left', [4, 5, 6, 7], 10, true);
    this.player.animations.add('right', [8, 9, 10, 11], 10, true);
    this.player.animations.play('up');
    
   // var walk = this.player.animations.add('walk');
   //this.player.animations.play('walk', 20, false);

    this.game.physics.arcade.enable(this.player);
    this.player.body.drag = 300;
    

    for(var i = 0;i < 10; i++){
        var x = this.game.rnd.realInRange(0, 700);
        var y = this.game.rnd.realInRange(0,700);
        var c =  this.mummy.getFirstExists(false).reset(x, y);
        c.scale.setTo(1,1);
        this.mummyMove = this.game.add.tween(c).to({x:this.player.body.position.x},
            1500,Phaser.Easing.Linear.None,true,0,1200,true);
    }
    
    //camera follows the player
    this.game.camera.follow(this.player);

    this.cursors = this.game.input.keyboard.createCursorKeys();

    this.text = this.game.add.text(20, 20, "Coins: ", { font: "30px Arial", fill: "#fff", align: "center" });
  this.text.fixedToCamera = true;
  
    function timer() {
     
    _this.game.timerIndex = setTimeout(function() {
        _this.seconds -= 1;
       _this.timerText.setText(_this.seconds);
       timer();
       
       if(_this.seconds <= 0) {
                _this.gameOver();
                clearInterval(_this.game.timerIndex);
                _this.seconds = 60;
                }
      },1000);
     
    }
    
    timer();
  },
  createItems: function() {
    //create items
    this.items = this.game.add.group();
    this.items.enableBody = true;
    var item;    
    result = this.findObjectsByType('item', this.map, 'objectsLayer');
    result.forEach(function(element){
      this.createFromTiledObject(element, this.items);
    }, this);
  },
  createDoors: function() {
    //create doors
    this.doors = this.game.add.group();
    this.doors.enableBody = true;
    result = this.findObjectsByType('door', this.map, 'objectsLayer');

    result.forEach(function(element){
      this.createFromTiledObject(element, this.doors);
    }, this);
  },
  
  createEnemy: function() {
      //create doors
      this.mummy = this.game.add.group();
      this.mummy.enableBody = true;
      
      for (var i = 0; i < 50; i++)
      {
          var m = this.mummy.create(0, 0, 'mummy');
          m.scale.y = 0.5;
          m.name = 'mummy' + i;
          m.exists = false;
          m.visible = false;
          m.checkWorldBounds = true;
          
          m.events.onOutOfBounds.add(function(m){
              m.kill();
          }, this);
      }
     
    },
    

  findObjectsByType: function(type, map, layer) {
    var result = new Array();
    map.objects[layer].forEach(function(element){
      if(element.properties.type === type) {

        element.y -= map.tileHeight;
        result.push(element);
      }      
    });
    return result;
  },
  //create a sprite from an object
  createFromTiledObject: function(element, group) {
    var sprite = group.create(element.x, element.y, element.properties.sprite);

      //copy all properties to the sprite
      Object.keys(element.properties).forEach(function(key){
        sprite[key] = element.properties[key];
      });
      
    //create countdown time
      
      this.timerImage = this.add.image(20, 60, 'watch');
      this.timerImage.fixedToCamera = true;

      //this.timer = 40;
      this.timerText = this.add.text(60, 65,' ', { fontSize: 20, fill: 'white' });
      this.timerText.fixedToCamera = true;
      //console.log(this.timerText);
      
  },
     update: function() {
   var _this = this;
   
    //collision
    this.game.physics.arcade.collide(this.player, this.blockedLayer);

    this.game.physics.arcade.overlap(this.player, this.mummy, function(player,mummy){
      player.kill();
      _this.gameOver();
    });
    this.game.physics.arcade.overlap(this.player, this.items, function(player,collectable){
      
      if(collectable.key == 'greencup') {
          _this.music.collectCoin.play();
        _this.game.allCoins++;
          _this.text.text = 'Coins: ' + _this.game.allCoins;

      }
      else if(collectable.key == 'bluecup'){
          _this.music.collectTime.play();
            _this.seconds += 10;
            _this.timerText.setText(_this.seconds);
            
          
      }
      collectable.destroy();

      //console.log(collectable);
    });
    this.game.physics.arcade.overlap(this.player, this.doors, this.enterDoor, null, this);

    //player movement
    
    this.player.body.velocity.x = 0;
    this.player.body.velocity.y = 0;

   if(this.cursors.up.isDown) {
      this.player.body.velocity.y = -300;
      this.player.animations.play('up');
    }
    if(this.cursors.down.isDown) {
      this.player.body.velocity.y = 300;
      this.player.animations.play('bottom');
    }
    if(this.cursors.left.isDown) {
      this.player.body.velocity.x = -300 ;
      this.player.animations.play('left');
    }
    if(this.cursors.right.isDown) {
      this.player.body.velocity.x = 300;
      this.player.animations.play('right');
    }
  },
  collect: function(player, collectable) {
    //console.log('Got it!');
  

  },
  enterDoor: function(player, door) {
    this.state.start('Win');
    DataManager.uploadScore(this.game.allCoins+10);
  },
};

TopDownGame.Dungeon.prototype.die = function(){
  this.state.start('DungeonOver');
}

TopDownGame.Dungeon.prototype.gameOver = function(){
  this.music.backgroundSound.stop();
  clearInterval(this.game.timerIndex);
  console.log(this.timerIndex);
  DataManager.uploadScore(this.game.allCoins);
  this.state.start('GameOver');

}
    