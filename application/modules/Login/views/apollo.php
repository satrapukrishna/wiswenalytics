<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png" />
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>asset/spinfocityasset/Images/Web-Icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/spinfocityasset/CSS/StyleSheetab.css" rel="stylesheet" />
    
    
</head>
<body>
    <div class="LoginBgHldr">
        <div class="LoginHldr">
            <div class="LoginTtlHldr">
                <span class="LoginTtlNm">Apollo</span><span class="LoginTtlNmee"> Login</span>
            </div>

            <div class="LoginBx">
                <ul class="LoginType">
                    <li>
                        <span class="Lnk Actv">Login Page</span>
                    </li>
                   <!--  <li>
                        <span class="Lnk">Administrator</span>
                    </li> -->
                </ul>
                <form action="<?php echo 'Login/autenticate';?>" method="post">
                    <ul class="LoginFlds">
                        <li>
                            <input type="text" placeholder="Username" name="uname" id="uname"  class="Inpt" required autofocus />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="pwd" id="pwd" class="Inpt" required/>
                        </li>
                        <li>
                            <button type="submit" class="InptBtn" id="nextPage">Login</button>
                            <!-- <input type="button" class="InptBtn" id="nextPage" value="Login" /> -->
                        </li>
                        <!-- <li>
                            <span class="FrgtPssd">Forgot Password?<a href="" class="Lnk">Request for password change</a></span>
                        </li> -->
                    </ul>
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