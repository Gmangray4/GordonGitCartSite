

let brainToggle = false;
let heartToggle = false;
let lungsToggle = false;
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


function checkWindow(){
  brainCheck();
  heartCheck();
  lungcheck();
}

function brainCheck(){
if(brainToggle == false) {
    let div = document.createElement("div");
    div.className = "BrainWind";
    let id = "BrainWindow";
    div.id = id;
    div.style.zIndex = 2;
    document.getElementById("mainDiv").appendChild(div);
    brainToggle = true;
  }else if (brainToggle ==true) {
    document.getElementById("BrainWindow").remove();
    brainToggle = false;
  }
}
function heartCheck(){
if(heartToggle == false) {
    let div = document.createElement("div");
    div.className = "HeartWind";
    let id = "HeartWindow";
    div.id = id;
    div.style.zIndex = 3;
    document.getElementById("mainDiv").appendChild(div);
    heartToggle = true;
  }else if (heartToggle ==true) {
    document.getElementById("HeartWindow").remove();
    heartToggle = false;
  }
}

function lungsCheck(){
if(lungsToggle == false) {
    let div = document.createElement("div");
    div.className = "LungsWind";
    let id = "LungsWindow";
    div.id = id;
    div.style.zIndex = 3;
    document.getElementById("mainDiv").appendChild(div);
    lungsToggle = true;
  }else if (lungsToggle ==true) {
    document.getElementById("LungsWindow").remove();
    lungsToggle = false;
  }
}
