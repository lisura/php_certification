<?php

for($i=1; $i<=50; $i=$i+2)
	{
		if(!($i % 2)){
			continue;
		}
		else {
			echo $i.PHP_EOL;
		}
    }
