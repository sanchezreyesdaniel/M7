<?php
class Staff extends DataBoundObject {

    protected $FirstName;
    protected $LastName;
    protected $AddressID;
    protected $Email;
    protected $StoreID;
    protected $Active;
    protected $Username;
    protected $Password;
    protected $LastUpdate;
    protected $Picture;

    protected function DefineTableName() {
        return("staff");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "first_name" => "FirstName",
            "last_name" => "LastName",
            "address_id" => "AddressID",
            "email" => "Email",
            "store_id" => "StoreID",
            "active" => "Active",
            "username" => "Username",
            "password" => "Password",
            "last_update" => "LastUpdate",
            "picture" => "Picture"
        ));
    }
}
