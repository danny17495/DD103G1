<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
//   $user = "root";
//   $password = "01258963";
  $user = "dd103g1";
  $password = "dd103g1";
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>


<?php




<?php

/*----第一層---選產品----杯子---*/
if ($shopTypeChange1="1") {
/*----第二層---選白色杯子圖案---*/
  if ($shopCupColorChange1="1"){
 /*----第三層---選白色杯子圖案---*/
    if ($shopSrcChange1="1"){
        echo "decoNo=1";
        elseif ($shopSrcChange2="2"){
            echo "decoNo=2";
            else ($shopSrcChange3="3"){
                echo "decoNo=3";
            }
        }
    }
  }
 /*----第二層---選紅色杯子---*/
    elseif ($shopCupColorChange2="2"){
 /*----第三層---選紅色杯子圖案---*/
    if ($shopSrcChange1="1"){
        echo "decoNo=4";
        elseif ($shopSrcChange2="2"){
            echo "decoNo=5";
            else ($shopSrcChange3="3"){
                echo "decoNo=6";
            }
        }
    }
  }
 /*----第二層---選藍色杯子---*/
        else ($shopCupColorChange3="3"){
 /*----第三層---選藍色杯子圖案---*/
            if ($shopSrcChange1="1"){
                echo "decoNo=7";
                elseif ($shopSrcChange2="2"){
                    echo "decoNo=8";
                    else ($shopSrcChange3="3"){
                        echo "decoNo=9";
            }
        }
    }
  }
/*----第一層---選產品----衣服---*/
} else ($shopTypeChange2="2") {
/*----第二層---選白色衣服---*/
    if ($shopTColorChange1="1"){
/*----第三層---選白色衣服圖案---*/
        if ($shopSrcChange1="1"){
            echo "decoNo=10";
            elseif ($shopSrcChange2="2"){
                echo "decoNo=11";
                else ($shopSrcChange3="3"){
                    echo "decoNo=12";
            }
        }
    }
  }         
/*----第二層---選紅色衣服---*/
        elseif ($shopTColorChange2="2")
/*----第三層---選紅衣服圖案---*/
            if ($shopSrcChange1="1")[
                echo "decoNo=13";
                elseif ($shopSrcChange2="2"){
                    echo "decoNo=14";
                    else ($shopSrcChange3="3"){
                        echo "decoNo=15";
            }
        }
    }
  }     
  /*----第二層---選藍色衣服---*/
            else ($shopTColorChange3="3")
 /*----第三層---選藍色衣服圖案---*/
              if ($shopSrcChange1="1")[
                echo "decoNo=16";
                elseif ($shopSrcChange2="2"){
                    echo "decoNo=17";
                    else ($shopSrcChange3="3"){
                        echo "decoNo=18";
            }
        }
    }
  } 


?>

<script>
function shopTypeChange1()
{

}
</script>



    switch(type){
        case 1:
            console.log("馬克杯");
            break;
        case 2:
            console.log("T-shirt");
            break;
    }