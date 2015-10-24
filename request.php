<?php
include("adb.php");

class request extends adb{
    /**
    *a function to get a product identified by id
    */
    function get_request(){
        $str_query="select * from request";
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
    function add($Farmer, $LandSize, $Crop, $Seeds, $RequestAmount, $ExpectedYield, $ExpectedRevenue, $Revenue_ID){
        // you need a code to add product here
        $str_query="insert into request set Farmer='$Farmer',LandSize='$LandSize',Crop='$Crop',Seeds='$Seeds',RequestAmount='$RequestAmount',ExpectedYield='$ExpectedYield',ExpectedRevenue='$ExpectedRevenue',Revenue_ID='$Revenue_ID'";
        return $this->query($str_query);
    }




}
?>
