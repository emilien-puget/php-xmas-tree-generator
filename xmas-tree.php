<?php

	function generate_step($height, $numberStep)
	{
		echo '<span style="color: green">';
		$start = ($height * 2) * 0.8 * ($numberStep + 1);
		if ($numberStep == 0)
			$start = 0;
		for ($line = 0; $line < $height; ++$line)
		{
			for ($char = 0; $char < $start + ($line * 4); ++$char)
			{

				$colored = false;
				if (rand() % 20 == 0)
					$colored = true;

				if ($colored)
					echo '<span class="blink" style="color:red">';
				echo '*';
				if ($colored)
					echo '</span>';
			}
			echo '<br/>';
		}
		echo '</span>';
	}

	$height = 10;

	$maxStep = 10;

	if (isset($_GET['height']))
		$height = $_GET['height'];
	if (isset($_GET['step']))
		$maxStep = $_GET['step'];

echo "<script type='text/javascript'>
var blinkers;
window.addEventListener('load', init, false);
function init() {
	blinkers = document.getElementsByClassName('blink');
	setInterval(function() { toggleBlinkHandler(); }, 1050);
}
function toggleBlinkHandler() {
	toggleBlink();
	setTimeout(function() { toggleBlink(); }, 450);
}
function toggleBlink() {
	for(var i = 0; i < blinkers.length; i++) {
		if(blinkers[i].style.color == 'red') {
			blinkers[i].style.color = '';
        } else {
			blinkers[i].style.color = 'red';
        }
    }
}
</script>";

	echo '<center>';

	for ($step = 0; $step < $maxStep; ++$step)
	{
		generate_step($height, $step);
	}
	echo '<span style="color: saddlebrown">';
	for ($i = 0; $i < $height; ++$i)
	{
		for ($j = 0; $j < 10; ++$j)
			echo '*';
		echo '<br/>';
	}
	echo '</span>';

	echo '</center>';