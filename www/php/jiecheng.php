<?php
function fuck($a)
				{
					if($a == 1)
					{
						return 1;
					}
					$jieguo = $a * fuck($a-1);
					
					return $jieguo;
				}
				echo fuck(5);
				?>