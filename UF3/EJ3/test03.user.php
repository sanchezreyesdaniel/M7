<?php

        require("class.user.insert.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $objUser = new User($objPDO, 2);

        print "ID: " . $objUser->getID() . "<br />";
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";
        print "Password is " . $objUser->getPassword() . "<br />";
        print "Mail is " . $objUser->getEmailAddress() . "<br />";
        print "Wrong is " . ($objUser->getWrong()?:"---") . "<br />";

        $objUser->setFirstName("Ed2");
        $objUser->Save();

        $objUser2 = new User($objPDO);

        $objUser2->setFirstName("Steve");
        $objUser2->setLastName("Nowicki");
        $objUser2->setDateAccountCreated(date("Y-m-d"));

        print "First name is " . $objUser2->getFirstName() . "<br />";
        print "Last name is " . $objUser2->getLastName() . "<br />";

        print "Saving...<br />";

        //$objUser2->Save();

        print "ID in database is " . $objUser2->getID() . "<br />";


        $objUser3 = new User($objPDO, 1);

        print "<br />";

        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getPassword() . "<br />";
        print "Mail is " . $objUser3->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";




        $objUser4 = new User($objPDO, 9);

        print "<br />";

        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
        print "Last name is " . $objUser4->getLastName() . "<br />";
        print "Password is " . $objUser4->getPassword() . "<br />";
        print "Mail is " . $objUser4->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser4->getWrong()?:"---") . "<br />";


        print "ejercicio 3 " ;
        print "<br/>";
        print "<br/>";


        $name = $objUser3->getFirstName();
        $lasname = $objUser3->getLastName();
        $username = $objUser3->getUsername();
        $passw = $objUser3->getPassword();
        $email = $objUser3->getEmailAddress();
        $dateacountcreated = $objUser3->getDateAccountCreated();
        $timeacountcreated = $objUser3->getTimeAccountCreated();
        $datelastlogin = $objUser3->getDateLastLogin();
        $timaslastlogin = $objUser3->getTimeLastLogin();


        $objUser3->setFirstName($objUser4->getFirstName());
        $objUser3->setLastName($objUser4->getLastName());
        $objUser3->setUsername($objUser4->getUsername());
        $objUser3->setPassword($objUser4->getPassword());
        $objUser3->setEmailAddress($objUser4->getEmailAddress());
        $objUser3->setDateAccountCreated($objUser4->getDateAccountCreated());
        $objUser3->setTimeAccountCreated($objUser4->getTimeAccountCreated());
        $objUser3->setDateLastLogin($objUser4->getDateLastLogin());
        $objUser3->setTimeLastLogin($objUser4->getTimeLastLogin());


        $objUser4->setFirstName($name);
        $objUser4->setLastName($lasname);
        $objUser4->setUsername($username);
        $objUser4->setPassword($passw);
        $objUser4->setEmailAddress($email);
        $objUser4->setDateAccountCreated($dateacountcreated);
        $objUser4->setTimeAccountCreated($timeacountcreated);
        $objUser4->setDateLastLogin($datelastlogin);
        $objUser4->setTimeLastLogin($timeacountcreated);

        

        print "<br />";

        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getPassword() . "<br />";
        print "Mail is " . $objUser3->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";




        print "<br />";

        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
        print "Last name is " . $objUser4->getLastName() . "<br />";
        print "Password is " . $objUser4->getPassword() . "<br />";
        print "Mail is " . $objUser4->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser4->getWrong()?:"---") . "<br />";




        $objUser3->Save();
        $objUser4->Save();