<?php
//type of request
//1: get description of product
//2: delete product
//3: edit price
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
    case 1: //adding to the db
        include("people.php");
        $obj=new people();
        $firstname=$_REQUEST['firstname'];
        $lastname=$_REQUEST['lastname'];

            if($obj->add($firstname, $lastname)){

        echo '{"result":1,"message": "added successfully"}';
        }else{
            echo '{"result":0,"message": "person not added."}';
        }

        break;

    case 2: //fetching from the db
        include("people.php");
        $obj=new people();
//        $id=$_REQUEST['id'];


                //return a JSON string to browser when request comes to get description
        //echo '{"result":1,"firstname":"' .$row['firstname'] . '","lastname":"' .$row['lastname'] . '"}';

        if($obj->get_people()){



                //generate the JSON message to echo to the browser
    $row=$obj->fetch();
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
    default:
}
?>
