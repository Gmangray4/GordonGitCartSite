

let brainToggle = false;
let heartToggle = false;
let lungsToggle = false;

let bugsTotal;
let bugsBrain = 0;
let bugsHeart = 0;
let bugsLungs = 0;


let arrayIdsBrain = [];
let arrayIdsHeart = [];
let arrayIdsLungs = [];
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
}


function bugDisplayB() {
  //
  if (brainToggle === true) {
    for (let i = 0; i < bugsBrain; i++) {
      bugCreateB();
    }
    // removes the bugs if not ture;
  } else {
    for (var i = 0; i < arrayIdsBrain.length; i++) {
      document.getElementById(arrayIdsBrain[i]).remove();
      console.log(arrayIdsBrain[i]);
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
      console.log(arrayIdsHeart[i]);
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
      console.log(arrayIdsLungs[i]);
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
      console.log(bugsBrain);
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
    })
    LungsWindow.appendChild(img);
  }
}
