<?php

class Store extends DataBoundObject {

  
    protected $ManagerStaffID;
    protected $AddressID;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("store");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            
            "manager_staff_id" => "ManagerStaffID",
            "address_id" => "AddressID",
            "last_update" => "LastUpdate"
        ));
    }

   
}
?>
