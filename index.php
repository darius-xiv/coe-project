<?php session_start();?>
<html>
    <head>
        <title>COE Project</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
			$(document).ready(function(){
                $('#select1').change(function(){
                    $('#img1').attr('src', ($(this).val()));
                });
                $('#select2').change(function(){
                    $('#img2').attr('src', ($(this).val()));
                });
			});
		</script>
        <link rel="stylesheet" href="mycss.css">
    </head>
    <body>
        <div class="head">
            <h1>GPU COMPARISON APP</h1>
            <h4>This is an application where you could compare the stats of different GPU.</h4>
            <h5 id="choice2">(Note: The benchmark of each GPU information is retrieved from <a href="https://www.facebook.com/profile">this link</a>.)</h5>
        </div>
<?php
        if(!isset($_SESSION['name1'])){
?>
        <div class="head-sub">
            <h4 id="choice1">Please select your choice, then click "COMPARE" to show the stats difference.</h4>
        </div>
<?php
        } 
?>
         <form action="process.php" method="post">
            <div class="left" >
                <select name="object1" id="select1">
                    <option value="https://static.userbenchmark.com/resources/static/gpu/AMD-RX-570.jpg">RX 570</option>
                    <option value="https://static.userbenchmark.com/resources/static/gpu/Nvidia-GTX-1660-Super.jpg">GTX 1660S</option>
                    <option value="https://static.userbenchmark.com/resources/static/gpu/Nvidia-GTX-1080-Ti.jpg">GTX 1080TI</option>
                </select>
                <img id="img1" src=
                
<?php               
                    if (isset($_SESSION['url1']))
                    {
                        echo $_SESSION['url1'];
                    } else {
                        echo "https://static.userbenchmark.com/resources/static/gpu/AMD-RX-570.jpg";
                    }
?> 
                alt="GPU Image">
            </div>
            <span>VS</span>
            <div class="right">
                <select name="object2" id="select2">
                    <option value="https://static.userbenchmark.com/resources/static/gpu/AMD-RX-570.jpg">RX 570</option>
                    <option value="https://static.userbenchmark.com/resources/static/gpu/Nvidia-GTX-1660-Super.jpg">GTX 1660S</option>
                    <option value="https://static.userbenchmark.com/resources/static/gpu/Nvidia-GTX-1080-Ti.jpg">GTX 1080TI</option>
                 </select>
                <img id="img2" src=
                
<?php               
                    if (isset($_SESSION['url2']))
                    {
                        echo $_SESSION['url2'];
                    } else {
                        echo "https://static.userbenchmark.com/resources/static/gpu/AMD-RX-570.jpg";
                    }
?> 
                alt="GPU Image">
           
            </div>
            <input type="submit" value="COMPARE">
        </form>
<?php
        if(isset($_SESSION['name1']))
        {
?>
        <div class="info"> 
            <div class="left">
                <span><h4>GPU:</h4><?= $_SESSION['name1'];?></span>
                <span><h5>Release date:</h5><?= $_SESSION['date1'];?></span>
                <span><h5>Clock speed:</h5><?= $_SESSION['clockspeed1'];?> gHz <?= $_SESSION['clockspeedresult1'];?></span>
                <span><h5>Memory type:</h5>GDDR<?= $_SESSION['memtype1'];?> <?= $_SESSION['memtyperesult1'];?></span>
                <span><h5>Memory size:</h5><?= $_SESSION['memsize1'];?> MB <?= $_SESSION['memsizeresult1'];?></span>
                <span><h5>Thermanl design:</h5><?= $_SESSION['thermal1'];?>V <?= $_SESSION['thermalresult1'];?></span>
                <span><h5>Source:</h5><a href="<?= $_SESSION['url1'];?>">Click this link</a></span>
            </div>
            <div class="right">
            <span><h4>GPU:</h4><?= $_SESSION['name2'];?></span>
                <span><h5>Release date:</h5><?= $_SESSION['date2'];?></span>
                <span><h5>Clock speed:</h5><?= $_SESSION['clockspeed2'];?> gHz <?= $_SESSION['clockspeedresult2'];?></span>
                <span><h5>Memory type:</h5>GDDR<?= $_SESSION['memtype2'];?> <?= $_SESSION['memtyperesult2'];?></span>
                <span><h5>Memory size:</h5><?= $_SESSION['memsize2'];?> MB <?= $_SESSION['memsizeresult2'];?></span>
                <span><h5>Thermanl design:</h5><?= $_SESSION['thermal2'];?>V <?= $_SESSION['thermalresult2'];?></span>
                <span><h5>Source:</h5><a href="<?= $_SESSION['url2'];?>">Click this link</a></span>
            </div>
        </div>
<?php
        }
?>
    </body>
</html>