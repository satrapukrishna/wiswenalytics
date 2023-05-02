<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

<link rel="stylesheet" href="<?php echo base_url();?>asset/loginasset/css/aloginStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>asset/loginasset/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>asset/loginasset/images/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>


  <div class="text-center"> </div>
  <div class="main-head"><h3 class="cssanimation sequence leFadeInLeft">Welcome To My Home Vihanga</h3></div>
  <div class="container" >
  <div class="row">
  <div class="right">
    <h2>Sign In</h2>

  <form action="<?php echo 'MyHomeLogin/autenticate';?>" method="post">

    <div class="" id="loginalert"></div>
  
  <div class="input-Box">
  <i class="fa fa-user" aria-hidden="true"></i>
    <input type="text"  placeholder="Username" name="uname" id="uname" required autofocus>
    
      <!--<div class="mandtory-req">This field is required</div>-->
                           
  </div>
  <div class="input-Box">
  <i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password"  placeholder="Password" name="pwd" id="pwd" required>
    
     <!-- <div  class="mandtory-req">This field is required</div>-->
                            
  </div>
  <div class="login_bottom">
  <div class="Sign-in">
  <button type="submit" class="btn btn-primary" id="nextPage">Login</button>
   </div>
   </div>

  </form>

  </div>
</div>  
</div>

</body>
<script type="text/javascript">
document.getElementById("nextPage").onclick = function () {
        // window.location.href = "///H:/code_base/uma_new/protech/AdminLTE-3/dashboard.html";
    };

window.onload = function() {
    animateSequence();
    animateRandom();
};

function animateSequence() {
    var a = document.getElementsByClassName('sequence');
    for (var i = 0; i < a.length; i++) {
        var $this = a[i];
        var letter = $this.innerHTML;
        letter = letter.trim();
        var str = '';
        var delay = 100;
        for (l = 0; l < letter.length; l++) {
            if (letter[l] != ' ') {
                str += '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[l] + '</span>';
                delay += 150;
            } else
                str += letter[l];
        }
        $this.innerHTML = str;
    }
}

function animateRandom() {
    var a = document.getElementsByClassName('random');
    for (var i = 0; i < a.length; i++) {
        var $this = a[i];
        var letter = $this.innerHTML;
        letter = letter.trim();
        var delay = 70;
        var delayArray = new Array;
        var randLetter = new Array;
        for (j = 0; j < letter.length; j++) {
            while (1) {
                var random = getRandomInt(0, (letter.length - 1));
                if (delayArray.indexOf(random) == -1)
                    break;
            }
            delayArray[j] = random;
        }
        for (l = 0; l < delayArray.length; l++) {
            var str = '';
            var index = delayArray[l];
            if (letter[index] != ' ') {
                str = '<span style="animation-delay:' + delay + 'ms; -moz-animation-delay:' + delay + 'ms; -webkit-animation-delay:' + delay + 'ms; ">' + letter[index] + '</span>';
                randLetter[index] = str;
            } else
                randLetter[index] = letter[index];
            delay += 80;
        }
        randLetter = randLetter.join("");
        $this.innerHTML = randLetter;
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
</script>
</html>
