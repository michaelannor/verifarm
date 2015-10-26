<?php
//type of request
//1: get description of product
//2: delete product
//3: edit price
$seedaverage;
$yieldaverage;
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
    case 1: //adding to the db
        include("farmer.php");
        $obj=new farmer();
        $Username=$_REQUEST['Username'];
        $LastName=$_REQUEST['LastName'];
        $FirstName=$_REQUEST['FirstName'];
        $Location=$_REQUEST['Location'];
        $Telephone=$_REQUEST['Telephone'];


            if($obj->add($Username, $LastName, $FirstName, $Location, $Telephone)){

        echo '{"result":1,"message": "added successfully"}';
        }else{
            echo '{"result":0,"message": "person not added."}';
        }

        break;

    case 2: //fetching from the db
        include("farmer.php");
        $obj=new farmer();
//        $id=$_REQUEST['id'];


                //return a JSON string to browser when request comes to get description
        //echo '{"result":1,"firstname":"' .$row['firstname'] . '","lastname":"' .$row['lastname'] . '"}';

        if($obj->get_farmer()){



                //generate the JSON message to echo to the browser
    $row=$obj->fetch();
    echo '{"result":1,"farmer":[';	//start of json object
    while($row){
        echo json_encode($row);			//convert the result array to json object
        $row=$obj->fetch();
        if($row){
            echo ",";					//if there are more rows, add comma
        }
    }
    echo "]}";							//end of json array and object



//            echo '{"result":1,"message": "deleted"}';
        }

        else{
            echo '{"result":0,"message": "people not got."}';
        }
        break;

        case 3: //adding to the db
            include("request.php");
            $obj=new request();
            $obj2=new farmer();
            $Farmer=$_REQUEST['Farmer'];
            $LandSize=$_REQUEST['LandSize'];
            $Crop=$_REQUEST['Crop'];
            $Seeds=$_Location['Seeds'];
            $RequestAmount=$_REQUEST['RequestAmount'];
            $ExpectedYield=$_REQUEST['ExpectedYield'];
            $ExpectedRevenue=$_REQUEST['ExpectedRevenue'];
            $Revenue_ID=$_REQUEST['Revenue_ID'];

            $rating = process($LandSize, $Seeds);



                if($obj->add($Farmer, $LandSize, $Crop, $Seeds, $RequestAmount, $ExpectedYield, $ExpectedRevenue, $Revenue_ID)){
                    $obj2->setRating($rating, $Farmer);
            echo '{"result":1,"message": "added successfully"}';
            }else{
                echo '{"result":0,"message": "person not added."}';
            }

            break;

        case 4: //fetching from the db
            include("request.php");
            $obj=new request();
    //        $id=$_REQUEST['id'];


                    //return a JSON string to browser when request comes to get description
            //echo '{"result":1,"firstname":"' .$row['firstname'] . '","lastname":"' .$row['lastname'] . '"}';
            $row=$obj->get_request();
            if($row){



                    //generate the JSON message to echo to the browser
        // $row=$obj->fetch();
        echo '{"result":1,"people":[';	//start of json object
        while($row){
            echo json_encode($row);			//convert the result array to json object
            $row=$obj->fetch();
            if($row){
                echo ",";					//if there are more rows, add comma
            }
        }
        echo "]}";							//end of json array and object



    //            echo '{"result":1,"message": "deleted"}';
            }

            else{
                echo '{"result":0,"message": "people not got."}';
            }
            break;
        case 5: //fetching from the db

            include("farmer.php");
            $obj=new farmer();


           $ID=$_REQUEST['ID'];


                    //return a JSON string to browser when request comes to get description
            //echo '{"result":1,"firstname":"' .$row['firstname'] . '","lastname":"' .$row['lastname'] . '"}';
            $row=$obj->get_single_farmer($ID);
            if($row){



                    //generate the JSON message to echo to the browser
        // $row=$obj->fetch();
        echo '{"result":1,"farmer":[';	//start of json object
        while($row){
            echo json_encode($row);			//convert the result array to json object
            $row=$obj->fetch();
            if($row){
                echo ",";					//if there are more rows, add comma
            }
        }
        echo "]}";							//end of json array and object



    //            echo '{"result":1,"message": "deleted"}';
            }

            else{
                echo '{"result":0,"message": "people not got."}';
            }
            break;

          case 6: //fetching from the db
                include("request.php");
                $obj=new request();
               $ID=$_REQUEST['ID'];


                        //return a JSON string to browser when request comes to get description
                //echo '{"result":1,"firstname":"' .$row['firstname'] . '","lastname":"' .$row['lastname'] . '"}';

                if($obj->get_single_request($ID)){



                        //generate the JSON message to echo to the browser
            $row=$obj->fetch();
            echo '{"result":1,"request":[';	//start of json object
            while($row){
                echo json_encode($row);			//convert the result array to json object
                $row=$obj->fetch();
                if($row){
                    echo ",";					//if there are more rows, add comma
                }
            }
            echo "]}";							//end of json array and object



        //            echo '{"result":1,"message": "deleted"}';
                }

                else{
                    echo '{"result":0,"message": "people not got."}';
                }
                break;
                case 6:
                process();
                break;

    default:
}


function process($LandSize, $Seeds){

  $jsonurl = "https://www.quandl.com/api/v3/datasets/UFAO/CR_CORN_GHA.json";
  $jsonresponse = file_get_contents($jsonurl);
  $records = json_decode($jsonresponse, true);

  $jsonseed_arr = array();
  $jsonyield_arr = array();
  $jsonarea_arr=array();
  $i = 0;
	foreach ($records['dataset']['data'] as $br_data){ //loop through data
		$jsonseed_arr[] = $br_data[1]; //pull seeds
    $jsonarea_arr[] = $br_data[2]; //pull area
		$jsonyield_arr[] = $br_data[3]; //pull yield


    /*
    $br_labels = array_reverse($jsondates_arr); //reverse the data
    $br_values = array_reverse($jsonseed_arr); //reverse the data

    $br_labels = implode(",", $br_labels); //comma sep with double quotes around each
    $br_values = implode(", ", $br_values); //comma sep
    // echo $br_labels;
    // echo "  ::  ";
    // echo $br_values;
    // echo "<br></br>";
    */
    //if (++$i == 7) break;
}
// echo $br_labels;
// echo "  ::  ";
// echo $br_values;
// echo "<br></br>";

  $seedtotal = 0;
  $yieldtotal = 0;
  $areatotal = 0;
 foreach ($jsonseed_arr as $item) {
  $seedtotal += $item;
}
 foreach ($jsonyield_arr as $item) {
   $yieldtotal += $item;
 }
 foreach ($jsonarea_arr as $item) {
   $areatotal += $item;
 }
  $seedaverage = $seedtotal/count($jsonseed_arr);
  $yieldaverage = $yieldtotal/count($jsonyield_arr);
  $areaaverage = $areatotal/count($jsonarea_arr);
  echo $seedaverage;
  echo " :: ";
  echo $yieldaverage;
  echo " :: ";
  echo $areaaverage;
  $yieldmass = $yieldaverage * $LandSize;

  $benchmark = $yieldmass/$Seeds;
  $farmerbench = $yieldmass/$seedaverage;

  $rating = (($farmerbench/$benchmark)*70);

return $rating;
}

  //go quandl
  //get data
  //process data
  //$exp
  //$rev
  //$returnarray[];
  // $returnarray[0]=$exp;
  // $returnarray[1]=$rev;
  // return returnarray;


?>
