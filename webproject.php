#!/usr/local/bin/php -d display_errors=STDOUT
<?php print('<?xml version = "1.0" encoding="utf-8"?> ');
	print "\n";
print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"');
print "\n";
print('"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">');
print "\n";
?>
<style>
<?php include 'main.css'; ?>
</style>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Donna Fang | web projects</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" />

	<script type="text/javascript">
	 
	// ANIMATED BOX
	counter = 0;
	move_counter = 1;

	function move_it()
	{
		//counter ++;
		if (move_counter > 4) {
			move_counter = 1; 
		}

		if (move_counter == 1) {
			left_offset = divObj.style.left;
			left_offset = parseInt(left_offset); // Extract number from above value string.
			left_offset++;
			divObj.style.left = left_offset + "px"; // Move div to the right by 1 pixel.
			if (left_offset == 460) {
				move_counter++
			}
		} 
		if (move_counter == 2) {
			top_offset = divObj.style.top;
			top_offset = parseInt(top_offset); // Extract number from above value string.
			top_offset++;
			divObj.style.top = top_offset + "px"; // Move div to the right by 1 pixel
			if (top_offset == 200) {
				move_counter++
			}
		}
		if (move_counter == 3) {
			right_offset = divObj.style.left;
			console.log(right_offset);
			right_offset = parseInt(right_offset); // Extract number from above value string.
			right_offset--;
			divObj.style.left = right_offset + "px"; // Move div to the right by 1 pixel
			if (right_offset == 10) {
				move_counter++
			}
		} 

		if (move_counter == 4) {
			bottom_offset = divObj.style.top;
			bottom_offset = parseInt(bottom_offset); // Extract number from above value string.
			bottom_offset--;
			divObj.style.top = bottom_offset + "px"; // Move div to the right by 1 pixel
			if (bottom_offset == 10) {
				move_counter++
			}
		}

		//if (counter < 200) {
		setTimeout("move_it()",5); // Pause for 20 ms and call the function move_it again. 
		//}
	}

		// CALCULATOR
		function start() 
		{
			divObj = document.getElementById("box"); // Get DOM node object corresponding to box.
			divObj.style.position = "absolute";
			divObj.style.left = 10 + "px";
			divObj.style.top = 10 + "px";
			move_it(); // Recursively call the move_it function so it moves every 20 ms.
		}

		var num1 = null;
		var operand = null;
		var should_clear = false;
		var number_counter = 0;


	     function display(num) {
	        var node = document.getElementById("display");
			node.value=num; // Sets the value of id display element to the previous number. Display value is updated to previous number
	     };

	     function getCurrentValue(value_selected) { // value_selected is container for value (view called function code)

	     	var node = document.getElementById("display"); // Grabs id display element.
	     	current_value = node.value;
			 // If value selected is not an operand
			if (!valueIsOperand(value_selected)) {
				if (should_clear == false) {
	     	    	return current_value + value_selected;
	     		} else {
	     			if (operand == "=") {
	     				number_counter = 0;
	     			}
	     			should_clear = false;
	     			return value_selected;
	     		}

	     	// If value selected IS an operand.
	     	} else if (current_value == null) {
	     		return "";
	 		} else {
	     		number_counter = number_counter+1;

	     		if (number_counter < 2) {
	     			num1 = current_value;
	     			operand = value_selected;
	     			should_clear = true;
	     			return current_value;
	     		} else if (operand != "=") {					// all this below
	     			num1 = doOperation(operand, current_value, num1); 
	     			operand = value_selected;
	     			should_clear = true;
	     			return num1; // Call function to do operation and display the answer.
	     		} else {
	     			operand = value_selected;
	     			should_clear = true;
	     			return current_value;
	     		}
	     	}
	     };

	     function valueIsOperand(value_selected) {
	     	return (value_selected == "/" || value_selected == "*" || value_selected == "+" || value_selected == "-" || value_selected == "=")
	     };

	     function doOperation(operand, arg1, arg2) {
	     	arg1 = Number(arg1);
	     	arg2 = Number(arg2);

	     	console.log(arg2 + " " + operand + " " + arg1 + " = ...");

	     	if (operand == "+") {
	     		number_counter = 1;
	     		ans = arg1 + arg2;
	     	} else if (operand == "-") {
	     		ans = arg2 - arg1;
	     		number_counter = 1;
	     	} else if (operand == "/") {
	     		ans = arg2 / arg1;
	     		number_counter = 1;
	     	} else if (operand == "*") {
	     		ans = arg2 * arg1;
	     		number_counter = 1;
	     	} else if (operand == "=") {
	     		should_clear = true;     		
	     	}

	     	console.log(ans);

	 		return ans;
	     };

	</script>
</head>

<body onload = "start()">

    <div id="navbar">
        <ul>
            <li id="name"><a href="index.html"> DONNA FANG </a></li>
            <li class="right"><a href="artproject.html"> art projects </a></li>
            <li class="right"><a href="webproject.php"> <u> web projects </u> </a></li>
            <li class="right"><a href="webdesign.html"> web design </a></li>
            <li class="right"><a href="about.html"> about me </a></li>
        </ul>
    </div>

    <!--INTERACTIVE-->
  <!--   <div class = "fields">
		<form method = "get" id = "welcome">
			>> What's your name?
			<input type="text" class = "type_something" name = "name"/> 
		</form>

 	<?php 
		// $name = $_GET["name"];
		// if (isset($_GET["name"])) { 
		// 	echo ">> Hi " . $name . ". Thank you for visiting."; 
		// }
	?> 

	</div>  -->
    
    <!--CALCULATOR-->
    <?php 
    date_default_timezone_set('America/Los_Angeles');
    $timestamp = time(); // Current timestamp.

    $weekday = date("l", $timestamp);

    $month = date("F",$timestamp);
    $day = date("j", $timestamp);
    $year = date("Y", $timestamp);

    $hour = date("h", $timestamp);
    $minutes = date("i", $timestamp);
    // $seconds = date("s", $timestamp);
    $apm = date("A", $timestamp);

    echo '<div id="date_time">';
    echo "$weekday";
    echo "<br/>";
    echo "$month $day, $year";
    echo "<br/>";
    echo "$hour:$minutes $apm";
    echo '</div>';
    ?>

    <div id="date_time_block"> </div>
		<div id="date_time_description">
			<h1>Date and Time Display</h1>
			<br>
			A simple display of the current date and time using PHP.
			<br>
		</div>
	</div>


<!-- 	<p>
		<img id = "ghost" src = "ghost.jpg"/>

		<script type = "text/javascript">
			// a)
			moving = false; 
			// b) Write a snippet of JS that registers an onmousemove event for the document object that calls a function move_ghost.
			document.onmousemove = move_ghost; 
			// c)
			document.getElementById("ghost").style.position = "absolute";
			// d)
			document.getElementById("ghost").onclick = function(){
				moving = !moving;
				// alert(moving);
			}
			// e) 
			function move_ghost(e) {				
				var getX = e.pageX;
				var getY = e.pageY;

				if(getX < 0) {getX = 0;}
				if(getY < 0) {getY = 0;}
				
				// For display
				var x = document.getElementById("x")
				var y = document.getElementById("y")

				x.value = getX;
				y.value = getY;
				// ^

				if(moving == true) {
					// Use DOM to get the img.
					var ghost_img = document.getElementById("ghost");
					ghost_img.style.left = getX + "px"; // DONT FORGET THE px AFTER OMG.
					ghost_img.style.top = getY + "px";
				}
			} // End function.

		</script> -->


<!-- 	<form action="">
	X <input type="text" name="mx" id="x" value="0" size="4"><br>
	Y <input type="text" name="my" id="y" value="0" size="4"><br>
	</form>

</p> -->

	<div id="box"></div>

	<div id="moving_blue">
		<div id="moving_description">
			<h1>Animated Box</h1>
		</div>
	</div>

	<div id="calculator">
		<form action="" method="get">
		<p>
			<input type="text" id="display"/>
		</p>
		</form>

		<form action="" method="get">

			<div>
				<input class="button" type="button" value="7" onclick="display(getCurrentValue(value))"/>
				<input class="button" type="button" value="8" onclick="display(getCurrentValue(value))"/>
				<input class="button" type="button" value="9" onclick="display(getCurrentValue(value))"/>
				<input class="button" type="button" value="/" onclick="display(getCurrentValue(value))"/>
				<br/>
				<input type="button" value="4" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="5" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="6" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="*" onclick="display(getCurrentValue(value))"/>
				<br/>
				<input type="button" value="1" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="2" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="3" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="-" onclick="display(getCurrentValue(value))"/> 
				<br/>
				<input type="button" value="." onclick="display(getCurrentValue(value))"/>
				<input type="button" value="0" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="=" onclick="display(getCurrentValue(value))"/>
				<input type="button" value="+" onclick="display(getCurrentValue(value))"/>
			</div>

		</form>
	</div>

	<div id="calc">
		<div id="calc_description">	
			<h1>Basic Calculator</h1>
			<br>
				Select the numerical buttons and operational buttons to solve some basic arithmetic. 
		</div>
	</div>


</body>
</html>
