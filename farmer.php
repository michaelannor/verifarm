<?php
include("adb.php");

class farmer extends adb{
    /**
    *a function to get a product identified by id
    */
    function get_farmer(){
        $str_query="select * from farmer";
        if(!$this->query($str_query)){
            return false;
        }
        return $this->fetch();

    }
    /**
     * [[Description]]
     * @param [[Type]] $firstname [[Description]]
     * @param [[Type]] $lastname  [[Description]]
     */
    function add($Username, $LastName, $FirstName, $Location, $Telephone){

        // you need a code to add product here
        $str_query="insert into Farmer set Username='$Username',LastName='$LastName',FirstName='$FirstName',Location='$Location',Telephone='$Telephone'";

        return $this->query($str_query);

    }

    function setRating($Rating, $Farmer){
      $str_query="update Farmer set Rating='$Rating' where Username='$Farmer'";
    }



}
?>
