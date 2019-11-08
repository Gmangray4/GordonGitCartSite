<?php
//check if there has been something posted to the server to be processed
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["ajaxTest"])) {
 $theFile = fopen("files/testFile.txt", "r") or die("Unable to open file!");

// have  every 3 lines an object ... ]

$counter = 0;
$numberAttsPerObject = 4;
$outArr = array();
while(!feof($theFile)) {
   // for every 3rd line  - create a NEW PHP object
     if($counter%$numberAttsPerObject ==0) {
       $pData=new stdClass();
     }
     // keep track of the keys ..
    //for each attribute in our php object we want a key  - 0,1 or 2
     $i = $counter%$numberAttsPerObject;
     // assign ... AND TRIM (remove white space)
     $pData->$i = trim(fgets($theFile));
     // if we have JUST completed the 3rd attribute and we are not at 0 -> write the object to the array
     if($i ==$numberAttsPerObject-1 && $counter!=0) {
       array_push($outArr, $pData);
     }
     // increment the counter ...
     $counter = $counter+1;
   }

  fclose($theFile);
  // var_dump($outArr);
  // Now we want to JSON encode these values to send them to $.ajax success.
  $myJSONObj = json_encode($outArr);
  echo $myJSONObj;
  exit;
 }
// exit;
?>

<!DOCTYPE html>
<html>
<head>
<title>Same Form Ex BUT READ </title>
<!-- get JQUERY -->
<script src = "jquery/jquery-3.4.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/galleryStyle2.css">
</head>
<body>
  <!-- NEW for the result -->
<div id = "result"></div>
<canvas id="canvas" width="300" height="300"></canvas>
<div id = "result2"></div>

<script>
// here we put our JQUERY

$(document).ready (function(){
console.log("in doc load");

let tempSpeed;

$.ajax({
  url: "read.php",
  type: "get", //send it through get method
  data: {
    ajaxTest: "fread"
  },
  success: function(response) {
    //Do Something
    // console.log("responded" +response);
    //use the JSON .parse function to convert the JSON string into a Javascript object
    let parsedJSON = JSON.parse(response);
  //  console.log(parsedJSON);
    displayResults(parsedJSON);
  },
  error: function() {
    console.log("error occurred");
  }
});

// dd?
/* STEP 1:
/* THis is showing you how to access the canvas associated with the first box
It also shows you how to access the associated drawing context
and adding the relevent event listeners. You can follow this code for
accessing the other canvases and their associated contexts.
*/

let canvas = document.getElementById("canvas")
//get the context
let context = canvas.getContext("2d");


// register event listeners with 1st box
// canvas.addEventListener('mousemove',mouseoverhandler );


/*** The lists of objects that will be indide each canvas **/
let rectList = []; // variable to hold your list of rectangles

/* STEP 2:: CREATE 10 RectShapeObject instances and put into the rectList */
const NUM_RECTS=10;
for (let i=0; i <  NUM_RECTS;i++){
  rectList.push(new RectShapeObject(i,i,50,50,context,canvas,(i%5)+1,(i%7)+1));
};

/**** ANIMATION CODE *****************/
requestAnimationFrame(animationLoop);
 /*MAIN ANIMATION LOOP */
function animationLoop(){


    // put code here to display and update contents in canvasAniA
    /* STEP 6:: go through the rectList  and display and update shapes  */

  context.clearRect(0,0,canvas.width,canvas.height);
  for (let i = 0; i < rectList.length; i++) {
    rectList[i].display();
    rectList[i].update();
  }

  }
  requestAnimationFrame(animationLoop);


/***** OBJECT DEFINITIONS  ***********************/
/* OBJECT DEFINITION FOR A SQUARE OBJECT SHAPE
constructor takes an initial xpos, ypos, width and height for the shape.
You also need to give the context and canvas associated
with the potential instance of this shape
*/


function RectShapeObject(x,y,w,h,context,canvas, speedX,speedY){
  this.context =context;
  this.canvas = canvas;
  this.x =x;
  this.y =y;
  this.w=w;
  this.h=h;

  this.innerW = this.w/2;
  this.innerH = this.h/2;

  this.innerX = this.x + this.innerW/2;
  this.innerY = this.y + this.innerH/2;

  this.speedX = speedX;
  this.speedY= speedY;


  // method to display - needs to be filled in
  this.display = function(){
    this.context.fillStyle ="white";
    // context.fillStyle = "#ff0000"
  this.context.fillRect(this.x, this.y, this.w, this.h);
  this.context.clearRect(this.innerX, this.innerY, this.innerW, this.innerH);
  }

  // method to update (animation) - needs to be filled in
  this.update = function(){
    if (this.x +this.w>this.canvas.width || this.x <0) {
    this.speedX*=-1;
    }

    if ((this.y+this.h)>this.canvas.height || this.y <0) {
    this.speedY*=-1;
    }

      this.x+=this.speedX;
      this.y+=this.speedY;
      this.innerX = this.x + this.innerW/2;
      this.innerY = this.y + this.innerH/2;
    }
}


function displayResults(parsedJSON) {
  for(let i =0; i < parsedJSON.length; i++){
     console.log(parsedJSON[i]);
     let cObj  = parsedJSON[i];
      let iNum = parseInt(cObj[1]); //Output will be 23.
      console.log(iNum);
      let para2;

      if(iNum < 0) {
        $("canvas").css("background-color", "blue");
        tempSpeed = 500;
        para2 = $('<p>').text("The cold air makes us slow!");
      }

      if(iNum > 0) {
        $("canvas").css("background-color", "red");
        tempSpeed = 10;
        para2 = $('<p>').text("The warm air makes us fast!");
      }

      setInterval(function(){animationLoop()},tempSpeed);

      let para = $('<p>').text("Your converted result is "+ cObj["1"]+ " in "+cObj["0"]);
      para.appendTo("#result");
      para2.appendTo("#result2");
    // }
  }
}

}); //on load
</script>
</body>
</html>
