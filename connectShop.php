<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
  $user = "root";
  $password = "01258963";

  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>






<?php

/*----第一層---選產品----杯子---*/
if ($shoChooseA="1") {
/*----第二層---選白色杯子圖案---*/
  if ($shopChooseB="1"){
 /*----第三層---選白色杯子圖案---*/
  	if ($shopChooseC="1"){
  		echo "decoNo=1";
  		else if ($shopChooseC="2"){
  			echo "decoNo=2"
  			else ($shopChooseC="3"){
  				echo "decoNo=3"
  			}
  		}
  	}
  }
 /*----第二層---選紅色杯子---*/
  	else if ($shopChooseB="2"){
 /*----第三層---選紅色杯子圖案---*/
  	if ($shopChooseC="1"){
  		echo "decoNo=4";
  		else if ($shopChooseC="2"){
  			echo "decoNo=5"
  			else ($shopChooseC="3"){
  				echo "decoNo=6"
  			}
  		}
  	}
  }
 /*----第二層---選藍色杯子---*/
  		else ($shopChooseB="3"){
 /*----第三層---選藍色杯子圖案---*/
  			if ($shopChooseC="1"){
  				echo "decoNo=7";
  				else if ($shopChooseC="2"){
  					echo "decoNo=8"
  					else ($shopChooseC="3"){
  						echo "decoNo=9"
  			}
  		}
  	}
  }
/*----第一層---選產品----衣服---*/
} else ($shopChooseA="2") {
/*----第二層---選白色衣服---*/
    if ($shopChooseB="1"){
/*----第三層---選白色衣服圖案---*/
    	if ($shopChooseC="1")[
    		echo "decoNo=10";
    		else if ($shopChooseC="2"){
    			echo "decoNo=11";
    			else ($shopChooseC="3"){
    				echo "decoNo=12";
  			}
  		}
  	}
  }			
/*----第二層---選紅色衣服---*/
  		else if ($shopChooseB="2")
/*----第三層---選紅衣服圖案---*/
  			if ($shopChooseC="1")[
  				echo "decoNo=13";
    			else if ($shopChooseC="2"){
    				echo "decoNo=14";
    				else ($shopChooseC="3"){
    					echo "decoNo=15";
  			}
  		}
  	}
  }		
  /*----第二層---選藍色衣服---*/
  			else ($shopChooseB="3")
 /*----第三層---選藍色衣服圖案---*/
  			  if ($shopChooseC="1")[
  			  	echo "decoNo=16";
    			else if ($shopChooseC="2"){
    				echo "decoNo=17";
    				else ($shopChooseC="3"){
    					echo "decoNo=18";
  			}
  		}
  	}
  }	






















?>