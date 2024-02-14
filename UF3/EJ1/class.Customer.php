<?php

class Customer {

        private $Cust_code;
        private $Cust_name;
        private $Cust_city;
        private $Working_area;
        private $Cust_country;
        private $Grade;
        private $Opening_amt;
        private $Receive_amt;
        private $Payment_amt;
        private $Phone_no;
        private $Agent_code;


        public function __call($strFunction, $arArguments) {

                $strMethodType = substr($strFunction, 0, 3);
                $strMethodMember = substr($strFunction, 3);
                switch ($strMethodType) {
                        case "set":
                                return($this->SetAccessor($strMethodMember,
                                       $arArguments[0]));
                                break;
                        case "get":
                                return($this->GetAccessor($strMethodMember));
                };
                return(false);
        }

        private function SetAccessor($strMember, $strNewValue) {
                if (property_exists($this, $strMember)) {
                        if (is_numeric($strNewValue)) {
                                eval('$this->' . $strMember . ' = ' . $strNewValue
                                     . ';');
                        } else {
                                eval('$this->' . $strMember . ' = "' . $strNewValue
                                     . '";');
                        };
                } else {
                        return(false);
                };
        }

        private function GetAccessor($strMember) {
                if (property_exists($this, $strMember)) {
                        eval('$strRetVal = $this->' . $strMember . ';');
                        return($strRetVal);
                } else {
                        return(false);
                };
        }
        public function exchange(Customer $otherCustomer) {
                $classVars = get_object_vars($this);
                foreach ($classVars as $varName => $varValue) {
                    $this->$varName = $otherCustomer->$varName;
                }
            }

}

?>