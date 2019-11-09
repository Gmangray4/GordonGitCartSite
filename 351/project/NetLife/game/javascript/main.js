let hp = 100;

//Jquarly elements
let $status;
let death = false;

let peaceDeath = null;

let shortestTimeAlive;
let longestTimeAlive;

let brainToggle = false;
let heartToggle = false;
let lungsToggle = false;

let bugsTotal = 0;
let bugsBrain = 0;
let bugsHeart = 0;
let bugsLungs = 0;


let arrayIdsBrain = [];
let arrayIdsHeart = [];
let arrayIdsLungs = [];

let suffering = 0;
// function AnimalObject(){
//
// this.species = species;
// this.sex = sex;
// this.name = name;
// this.heath = heath;
// this.hobbies = hobbies;
// this.birthplace = birthplace;
// this.appearance = appearance;
// };
$(document).ready(setup);

function setup() {
$status = $('#status');
condition();
// deathWindow();

}

function brainCheck(){
  if (lungsToggle == true) {
    document.getElementById("LungsWindow").remove();
    lungsToggle = false;
  }
  if (heartToggle == true) {
      document.getElementById("HeartWindow").remove();
      heartToggle = false;
  }

// if the brainWIndow does not already exsit then create one
if(brainToggle == false) {
    let div = document.createElement("div");
    div.className = "BrainWind";
    let id = "BrainWindow";
    div.id = id;
    div.style.zIndex = 2;
    document.getElementById("mainDiv").appendChild(div);
    brainToggle = true;
    bugDisplayB();
  }else if (brainToggle == true) {
    document.getElementById("BrainWindow").remove();
    brainToggle = false;
    bugDisplayB();
  }
}
function heartCheck(){
  if (lungsToggle == true) {
    document.getElementById("LungsWindow").remove();
    lungsToggle = false;
  }
  if (brainToggle == true) {
      document.getElementById("BrainWindow").remove();
      brainToggle = false;
  }
if(heartToggle == false) {
    let div = document.createElement("div");
    div.className = "HeartWind";
    let id = "HeartWindow";
    div.id = id;
    div.style.zIndex = 3;
    document.getElementById("mainDiv").appendChild(div);
    heartToggle = true;
    bugDisplayH();
  }else if (heartToggle ==true) {
    document.getElementById("HeartWindow").remove();
    heartToggle = false;
    bugDisplayH();
  }
}

function lungsCheck(){
  if (heartToggle == true) {
      document.getElementById("HeartWindow").remove();
      heartToggle = false;
  }
  if (brainToggle == true) {
      document.getElementById("BrainWindow").remove();
      brainToggle = false;
  }
if(lungsToggle == false) {
    let div = document.createElement("div");
    div.className = "LungsWind";
    let id = "LungsWindow";
    div.id = id;
    div.style.zIndex = 3;
    document.getElementById("mainDiv").appendChild(div);
    lungsToggle = true;
    bugDisplayL();
  }else if (lungsToggle ==true) {
    document.getElementById("LungsWindow").remove();
    lungsToggle = false;
    bugDisplayL();
  }
}

// update bugs
function bugsUpdate(){
  bugsBrain += Math.floor((Math.random() * 4));
  bugsHeart += Math.floor((Math.random() * 4));
  bugsLungs += Math.floor((Math.random() * 4));
  bugsTotal = bugsBrain + bugsHeart + bugsLungs;
  console.log(bugsBrain);
  console.log(bugsHeart);
  console.log(bugsLungs);
  console.log(bugsTotal);
  console.log(suffering);
}

function bugDisplayB() {
  if (brainToggle === true) {
    for (let i = 0; i < bugsBrain; i++) {
      bugCreateB();
    }
    // removes the bugs if not ture;
  } else {
    for (var i = 0; i < arrayIdsBrain.length; i++) {
      document.getElementById(arrayIdsBrain[i]).remove();
      // console.log(arrayIdsBrain[i]);
    }
    arrayIdsBrain = [];
  }
}

function bugDisplayH(){
if (heartToggle === true) {
  for (let i = 0; i < bugsHeart; i++) {
    bugCreateH();
  }
  // removes the bugs if not ture;
}else {
  for (var i = 0; i < arrayIdsHeart.length; i++) {
      document.getElementById(arrayIdsHeart[i]).remove();
      // console.log(arrayIdsHeart[i]);
    }
    arrayIdsHeart = [];
}
}

function bugDisplayL(){

if (lungsToggle === true) {
  for (let i = 0; i < bugsLungs; i++) {
    bugCreateL();
  }
  // removes the bugs if not ture;
}else {
  for (var i = 0; i < arrayIdsLungs.length; i++) {
      document.getElementById(arrayIdsLungs[i]).remove();
      // console.log(arrayIdsLungs[i]);
    }
    arrayIdsLungs = [];
}
}

function bugCreateB(){
  if (brainToggle === true) {
  //creates a fixed width and height for the images to appear on scrren
    let max_width = 400;
    let max_height = 150;
    let z = Math.floor((Math.random() * 100) + 1);
    // i = which Meme image to be picked from the image folder
    let i = Math.floor((Math.random() * 118) + 1);
    let imgSize = Math.floor((Math.random() * 50) + 100);
// picks a random spot to place the image
    let randomCoordinate = function() {
      var r = [];
      var x = Math.floor(Math.random() * max_width);
      var y = Math.floor(Math.random() * max_height) + 60;
      r = [x, y];
      return r;
    };
    let xy = randomCoordinate();
// how an image is created
    let img = document.createElement("img");
    // img.src = "images/memes/" + i + ".png";
    img.src = "images/placeHolder.jpg";
    img.className = "bugCss";
    let id = "img" + i;
    img.id = id;
    // adds the image to an id array
    arrayIdsBrain.push(id);
    img.height = imgSize;
    img.width = imgSize;
    img.style.position = "absolute";
    img.style.top = xy[1] + 'px';
    img.style.left = xy[0] + 'px';
    img.style.zIndex = z;
    img.addEventListener("click", function() {
      // removes the image from image id array if it is easered
      let index = arrayIdsBrain.indexOf(img.id);
      if (index !== -1) arrayIdsBrain.splice(index, 1);
      img.remove();
      bugsBrain -= 1;
      suffering -= 5;
    })
    BrainWindow.appendChild(img);
  }
}


function bugCreateH(){
  if (heartToggle === true) {
  //creates a fixed width and height for the images to appear on scrren
    let max_width = 400;
    let max_height = 150;
    let z = Math.floor((Math.random() * 100) + 1);
    // i = which Meme image to be picked from the image folder
    let i = Math.floor((Math.random() * 118) + 1);
    let imgSize = Math.floor((Math.random() * 50) + 100);
// picks a random spot to place the image
    let randomCoordinate = function() {
      var r = [];
      var x = Math.floor(Math.random() * max_width);
      var y = Math.floor(Math.random() * max_height) + 60;
      r = [x, y];
      return r;
    };
    let xy = randomCoordinate();
// how an image is created
    let img = document.createElement("img");
    // img.src = "images/memes/" + i + ".png";
    img.src = "images/placeHolder.jpg";
    img.className = "bugCss";
    let id = "img" + i;
    img.id = id;
    // adds the image to an id array
    arrayIdsHeart.push(id);
    img.height = imgSize;
    img.width = imgSize;
    img.style.position = "absolute";
    img.style.top = xy[1] + 'px';
    img.style.left = xy[0] + 'px';
    img.style.zIndex = z;
    img.addEventListener("click", function() {
      // removes the image from image id array if it is easered
      let index = arrayIdsHeart.indexOf(img.id);
      if (index !== -1) arrayIdsHeart.splice(index, 1);
      img.remove();
      bugsHeart -= 1;
      suffering -= 5;
    })
    HeartWindow.appendChild(img);
  }
}

function bugCreateL(){
  if (lungsToggle === true) {
  //creates a fixed width and height for the images to appear on scrren
    let max_width = 400;
    let max_height = 150;
    let z = Math.floor((Math.random() * 100) + 1);
    // i = which Meme image to be picked from the image folder
    let i = Math.floor((Math.random() * 118) + 1);
    let imgSize = Math.floor((Math.random() * 50) + 100);
  // picks a random spot to place the image
    let randomCoordinate = function() {
      var r = [];
      var x = Math.floor(Math.random() * max_width);
      var y = Math.floor(Math.random() * max_height) + 60;
      r = [x, y];
      return r;
    };
    let xy = randomCoordinate();
  // how an image is created
    let img = document.createElement("img");
    // img.src = "images/memes/" + i + ".png";
    img.src = "images/placeHolder.jpg";
    img.className = "bugCss";
    let id = "img" + i;
    img.id = id;
    // adds the image to an id array
    arrayIdsLungs.push(id);
    img.height = imgSize;
    img.width = imgSize;
    img.style.position = "absolute";
    img.style.top = xy[1] + 'px';
    img.style.left = xy[0] + 'px';
    img.style.zIndex = z;
    img.addEventListener("click", function() {
      // removes the image from image id array if it is easered
      let index = arrayIdsLungs.indexOf(img.id);
      if (index !== -1) arrayIdsLungs.splice(index, 1);
      img.remove();
      bugsLungs -= 1;
      suffering -= 5;
    })
    LungsWindow.appendChild(img);
  }
}

function damage(){
  hp -= bugsTotal;
  suffering += bugsTotal*2;
  console.log(hp);
  condition();
  console.log(suffering);
}

function condition(){
  if (hp >= 81) {
    $("#status").text('Great');
  }
  if (hp <= 80) {
$("#status").text('Good');
  }
  if (hp <= 50) {
$("#status").text('Okay');
  }
  if (hp <= 25) {
$("#status").text('Poor');
  }
  if (hp <= 0 && suffering >= 0) {
$("#status").text('RIP');
peaceDeath = true;
deathWindow();
  }
  if (hp <= 0 && suffering <= 1) {
$("#status").text('RIP');
peaceDeath = false;
deathWindow();
  }
}

function deathWindow(){
  let div = document.createElement("div");
  div.className = "DeathPW";
  let id = "DeathWindow";
  div.id = id;
  div.style.zIndex = 10;
  document.getElementById("mainDiv").appendChild(div);

if (peaceDeath == true) {
  $("#DeathWindow").html(
      '<h2 class="Dead">RIP</h2><h3  class="Dead"> <?php echo($outArr[0]);?> Passed on Peacefully!</h3><img class="DeadImg"src="images/placeHolder.jpg" alt="Place Holder image"><br><p class="DeathPW">You have successfully and responsibly insured that <?php echo($outArr[0]);?> has moved on peacefully!<br><br>Although <?php echo($outArr[0]);?> maybe gone now, <?php echo($outArr[0]);?> knows that you were their for them until the very end.<br><br>Thank you very being a responsibly vet!<br><br>Your the Best!</p><form class="main" action="title.php"><input class="Continuebutt" type="submit" value="Home"/></form></p>'
    );
}
if (peaceDeath == false) {
  $("#DeathWindow").html(
    '<h2 class="Dead">RIP</h2><h3 class="Dead"> <?php echo($outArr[0]);?> Passed on Painfully!</h3><img class="DeadImg"src="images/placeHolder.jpg" alt="Place Holder image"><br><p class="DeathPW"><?php echo($outArr[0]);?> has moved on but not peacefully!<br><br>Unfortunately <?php echo($outArr[0]);?> is gone and has painfully passed on without your aid.<br><br> A good vet is responsibe!<br><br>A better friend is there until the end!<br><br>Good luck next time!</p><form class="main" action="title.php"><input class="Continuebutt" type="submit" value="Home"/></form></p>'
  );
}
}
