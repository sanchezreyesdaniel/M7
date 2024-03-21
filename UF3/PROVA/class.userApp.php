<?php
class UserApp extends DataBoundObject {

    protected $Id;
    protected $Nom;
    protected $Group;
    protected $Created;
    protected $LastUpdated;
    protected $IsActive;

    protected function DefineTableName() {
        return ("userapp"); // Sin comillas
    }

    protected function DefineRelationMap() {
        return array(
            "id" => "Id",
            "nom" => "Nom",
            "group" => "Group",
            "created" => "Created",
            "lastupdated" => "LastUpdated",
            "isactive" => "IsActive"
        );
    }
}
?>