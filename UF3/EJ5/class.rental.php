<?php

class Rental extends DataBoundObject {

    protected $ID;
    protected $RentalDate;
    protected $InventoryID;
    protected $CustomerID;
    protected $ReturnDate;
    protected $StaffID;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("rental");
    }

   

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "rental_date" => "RentalDate",
            "inventory_id" => "InventoryID",
            "customer_id" => "CustomerID",
            "return_date" => "ReturnDate",
            "staff_id" => "StaffID",
            "last_update" => "LastUpdate"
        ));
    }
}

?>
