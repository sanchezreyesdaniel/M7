<?php
require_once('class.Address.php');
require_once('class.EmailAddress.php');
require_once('class.PhoneNumber.php');

class DataManager 
{
    private static $hDB;

    private static function _getConnection() {
        if (isset(self::$hDB)) {
            return self::$hDB;
        }

        self::$hDB = pg_connect("host=localhost port=5432 dbname=sample_db user=phpuser password=phppass")
            or die("Failure connecting to the database!");

        return self::$hDB;
    }

    public static function getAddressData($addressID) {
        $sql = "SELECT * FROM \"entityaddress\" WHERE \"addressid\" = $addressID";
        $res = pg_query(self::_getConnection(), $sql);
        if (!($res && pg_num_rows($res))) {
            die("Failed getting address data for address $addressID");
        }
        return pg_fetch_assoc($res);
    }

    public static function getEmailData($emailID) {
        $sql = "SELECT * FROM \"entityemail\" WHERE \"emailid\" = $emailID";
        $res = pg_query(self::_getConnection(), $sql);

        if (!($res && pg_num_rows($res))) {
            die("Failed getting email data for email $emailID");
        }

        return pg_fetch_assoc($res);
    }

    public static function getPhoneNumberData($phoneID) {
        $sql = "SELECT * FROM \"entityphone\" WHERE \"phoneid\" = $phoneID";
        $res = pg_query(self::_getConnection(), $sql);
        if (!($res && pg_num_rows($res))) {
            die("Failed getting phone number data for phone $phoneID");
        }

        return pg_fetch_assoc($res);
    }

    public static function getEntityData($entityID) {
        $sql = "SELECT * FROM \"entities\" WHERE \"entityid\" = $entityID";
        $res = pg_query(self::_getConnection(), $sql);
        if (!($res && pg_num_rows($res))) {
            die("Failed getting entity $entityID");
        }

        return pg_fetch_assoc($res);
    }

    public static function getAddressObjectsForEntity($entityID) {
        $sql = "SELECT \"addressid\" FROM \"entityaddress\" WHERE \"entityid\" = $entityID";
        $res = pg_query(self::_getConnection(), $sql);

        if (!$res) {
            die("Failed getting address data for entity $entityID");
        }

        return self::createObjects($res, 'Address', 'addressid');
    }

    public static function getEmailObjectsForEntity($entityID) {
        $sql = "SELECT \"emailid\" FROM \"entityemail\" WHERE \"entityid\" = $entityID";
        $res = pg_query(self::_getConnection(), $sql);

        if (!$res) {
            die("Failed getting email data for entity $entityID");
        }

        return self::createObjects($res, 'EmailAddress', 'emailid');
    }

    public static function getPhoneNumberObjectsForEntity($entityID) {
        $sql = "SELECT \"phoneid\" FROM \"entityphone\" WHERE \"entityid\" = $entityID";
        $res = pg_query(self::_getConnection(), $sql);

        if (!$res) {
            die("Failed getting phone data for entity $entityID");
        }

        return self::createObjects($res, 'PhoneNumber', 'phoneid');
    }

    private static function createObjects($result, $className, $idField) {
        $objects = array();

        while ($record = pg_fetch_assoc($result)) {
            $objects[] = new $className($record[$idField]);
        }

        return $objects;
    }
}
?>
