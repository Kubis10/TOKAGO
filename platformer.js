window.addEventListener("load",function() {

// Set up an instance of the Quintus engine  and include
// the Sprites, Scenes, Input and 2D module. The 2D module
// includes the `TileLayer` class as well as the `2d` componet.
  var Q = window.Q = Quintus({development: true}, {audioSupported: [ 'mp3']})
      .include("Sprites, Scenes, Input, 2D, Anim, Touch, UI, TMX, Audio")
      // Maximize this game to whatever the size of the browser is
      .setup({ maximize: true })
      // And turn on default input controls and touch input (for UI)
      .enableSound()
      .touch()
      // And turn on input controls and touch input (for UI)
      Q.input.keyboardControls({
        A: "left",
        D: "right",
        W: "up",
        LEFT: "left",
        RIGHT: "right",
        UP: "up"
      })
      Q.input.touchControls({
      controls:   [ ['left','<' ],
                    ['right','>' ],
                    [],
                    [],
                    ['up','/\\']]
      });

// ## Player Sprite
  Q.Sprite.extend("Player",{

    // the init constructor is called on creation
    init: function(p) {

      this._super(p, {
        sheet: "player",  // Setting a sprite sheet sets sprite width and height
        jumpSpeed: -400,
        speed: 300
      });

      this.add('2d, platformerControls');

      this.on("hit.sprite",function(collision) {

        if(collision.obj.isA("Tower")) {
          run=false;
          saveUserTime();
          Q.stage().pause();
          if(level>=11){
            Q.stageScene("gameover", 1, {label: "Dziękuje za przejście gry!"});
          }
          else {
            Q.stageScene("nextLevel", 1, {label: "Udało się!"});
          }
          this.destroy();
        }
      });
    }
  });


// ## Tower Sprite
  Q.Sprite.extend("Tower", {
    init: function(p) {
      this._super(p, { sheet: 'tower' });
    }
  });

// ## Enemy Sprite
// Create the Enemy class to add in some baddies
  Q.Sprite.extend("Enemy",{
    init: function(p) {
      this._super(p, { sheet: 'enemy', vx: 100, visibleOnly: true });

      this.add('2d, aiBounce');

      this.on("bump.left,bump.right,bump.bottom",function(collision) {
        if(collision.obj.isA("Player")) {
          Q.stageScene("endGame",1, { label: "Umarłeś" });
          run=false;
          Q.stage().pause();
          collision.obj.destroy();
        }
      });

      this.on("bump.top",function(collision) {
        if(collision.obj.isA("Player")) {
          this.destroy();
          collision.obj.p.vy = -300;
        }
      });
    }
  });
  //get from html id and level
let div1 = document.getElementById("level");
let level = div1.textContent;
let div2 = document.getElementById("ids");
let id = div2.textContent;
// ## Level0 scene (test)
  Q.scene("level0",function(stage) {
    Q.stageTMX("level0.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
// ## Level1 scene
  Q.scene("level1",function(stage) {
    Q.stageTMX("level1.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
// ## Level2 scene
  Q.scene("level2",function(stage) {
    Q.stageTMX("level2.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level3 scene
  Q.scene("level3",function(stage) {
    Q.stageTMX("level3.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level4 scene
  Q.scene("level4",function(stage) {
    Q.stageTMX("level4.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level5 scene
  Q.scene("level5",function(stage) {
    Q.stageTMX("level5.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level6 scene
  Q.scene("level6",function(stage) {
    Q.stageTMX("level6.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level7 scene
  Q.scene("level7",function(stage) {
    Q.stageTMX("level7.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level8 scene
  Q.scene("level8",function(stage) {
    Q.stageTMX("level8.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level9 scene
  Q.scene("level9",function(stage) {
    Q.stageTMX("level9.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level10 scene
  Q.scene("level10",function(stage) {
    Q.stageTMX("level10.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  // ## Level11 scene
  Q.scene("level11",function(stage) {
    Q.stageTMX("level11.tmx",stage);
    stage.add("viewport").follow(Q("Player").first());
  });
  //##FUNCTIONS
  //ajax save level
  function saveUserLevel() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "savelevel.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${id}&level=${level}`);
  }
  //ajax save time
  function saveUserTime() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ranking.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${id}&level=${level}&time=${time}`);
  }
  //js stopper
   var stopper = setInterval(myTimer, 10);
   let time = 0;
   let run = false;
   let gui = false;
   function myTimer() {
     if(run) {
       time += 0.01;
       Q.stageScene('times', 3)
     }
     if((Q.inputs['right'] || Q.inputs['left']) && gui === false) {
        run=true;
        gui = true;
     }
   }
   //reset time
   function reset(){
     time=0;
   }
  document.onkeyup = function(e){
    if (e.ctrlKey && e.altKey && e.shiftKey && e.which == 85){
      cheatCode();
    }
  }
  //dev shortcut or.. cheats?
  function cheatCode() {
    var cheat = prompt("Code:");
    if (cheat != null) {
      if(cheat === "Level"){
        level = prompt("Level:");
        if(level>=0&&level<12) {
          saveUserLevel();
          location.reload();
        }
      }
    }
  }
   //##SCENES
   //display timer
   Q.scene('times',function(stage) {
     var container = stage.insert(new Q.UI.Container({
       x: 50, y: 0, fill: "rgba(0,0,0,0.5)"
     }));

     stage.insert(new Q.UI.Text({x:50, y: 20,
       label: "Czas: " + time.toFixed(2) + "s", color: "white" }),container);

     container.fit(20, 20);
   });
   //pause button
  Q.scene('pause',function(stage) {
    stage.insert(new Q.UI.Button({
      asset: 'pause.png',
      x: Q.width-50,
      scale: 0.4,
      y: 50
    }, function() {
      if(time==0){
        gui =!gui;
      }
      else{
        run=!run;
      }
      if(run===false && gui === true){
        Q.stage(0).pause();
        Q.stageScene('menu', 2);
      }
      else{
        Q.stage(0).unpause();
        Q.clearStage(2);
      }
      this.p.angle += 90;
    }));
  });
  //script music
  let muzyka = true;
  if(muzyka===true){
    Q.audio.play('jump.mp3',{ loop: true });
  }
  else{
    Q.audio.stop();
  }
  //menu section
  Q.scene('menu',function(stage) {
    var container = stage.insert(new Q.UI.Container({
      x: Q.width/2, y: Q.height/2-100, fill: "rgba(0,0,0,0.9)"
    }));
    stage.insert(new Q.UI.Text({
      label: "Pauza",
      color: "white",
      x: 0,
      y: 0
    }),container);
    stage.insert(new Q.UI.Button({
      label: "Ranking",
      y: 60,
      x: 0,
      fill: "#f28400",
      border: 2,
    }, function() {
      location.replace("ranks.php")
    }),container);
    stage.insert(new Q.UI.Button({
      label: "Muzyka w tle",
      y: 115,
      x: 0,
      fill: "#f28400",
      border: 2,
    }, function() {
      muzyka=!muzyka;
    }),container);
    stage.insert(new Q.UI.Button({
      label: "Wyloguj się",
      y: 180,
      x: 0,
      fill: "#990000",
      border: 2,
    }, function() {
      location.replace("logout.php")
    }),container);

    container.fit(20, 50);
  });
  //die event
  Q.scene('endGame',function(stage) {
    var container = stage.insert(new Q.UI.Container({
      x: Q.width/2, y: Q.height/2, fill: "rgba(0,0,0,0.5)"
    }));

    var button = container.insert(new Q.UI.Button({ x: 0, y: 0, fill: "#CCCCCC",
      label: "Zagraj Ponownie" }))
    var label = container.insert(new Q.UI.Text({x:0, y: -10 - button.p.h,
      label: stage.options.label }));
    button.on("click",function() {
      Q.clearStages();
      reset();
      gui=false;
      Q.stageScene('level'+level);
      Q.stageScene('pause', 1);
    });

    container.fit(20);
  });
  //go to next level
  Q.scene('nextLevel',function(stage) {
    var container = stage.insert(new Q.UI.Container({
      x: Q.width/2, y: Q.height/2, fill: "rgba(0,0,0,0.5)"
    }));

    var button = container.insert(new Q.UI.Button({ x: 0, y: 0, fill: "#CCCCCC",
      label: "Następny poziom" }))
    var label = container.insert(new Q.UI.Text({x:0, y: -10 - button.p.h,
      label: stage.options.label }));
    button.on("click",function() {
      level = parseInt(level)+1;
      saveUserLevel();
      Q.clearStages();
      reset();
      gui=false;
      Q.stageScene('level'+level, 0);
      Q.stageScene('pause', 1);
    });

    container.fit(20);
  });
  //koniec gry
  Q.scene('gameover',function(stage) {
    var container = stage.insert(new Q.UI.Container({
      x: Q.width/2, y: Q.height/2, fill: "rgba(0,0,0,0.5)"
    }));

    var button = container.insert(new Q.UI.Button({ x: 0, y: 0, fill: "#CCCCCC",
      label: "Nowa gra" }))
    var label = container.insert(new Q.UI.Text({x:0, y: -10 - button.p.h,
      label: stage.options.label }));
    button.on("click",function() {
      level = 1;
      saveUserLevel();
      Q.clearStages();
      reset();
      gui=false;
      Q.stageScene('level'+level, 0);
      Q.stageScene('pause', 1);
    });

    container.fit(20);
  });


// Load TMX files
// and load all the assets referenced in them
  Q.loadTMX("level0.tmx, level1.tmx, level2.tmx, level3.tmx, level4.tmx, level5.tmx, level6.tmx, level7.tmx, level8.tmx, level9.tmx, level10.tmx, level11.tmx, sprites.json, pause.png", function() {
    Q.compileSheets("sprites.png","sprites.json");
    Q.stageScene('level'+level);
    Q.stageScene('pause', 1, Q('Player').first().p);
  },{
    progressCallback: function(loaded,total) {
      var element = document.getElementById("loading_progress");
      element.style.width = Math.floor(loaded/total*100) + "%";
    }
  });

});
