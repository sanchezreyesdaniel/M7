<?php

        require("class.user.insert.php");
        require("class.pdofactory.php");
        require("classLoger.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $objUser2 = new User($objPDO);

        // $objUser2->setFirstName("Delete");
        // $objUser2->setLastName("Delete");
        // $objUser2->setDateAccountCreated(date("Y-m-d"));

        // print "First name is " . $objUser2->getFirstName() . "<br />";
        // print "Last name is " . $objUser2->getLastName() . "<br />";

        // print "Saving...<br />";

        // $objUser2->Save();

        // print "ID in database is " . $objUser2->getID() . "<br />";

	// $objUser2->MarkForDeletion();

	// unset($objUser2);
        


        $objUser3 = new User($objPDO);
        $objUser3->setFirstName('Dani');
        $objUser3->setLastName('Sanchez');
        $objUser3->setUsername('DanielSanchez');
        $objUser3->setPassword('P@ssw0rd');
        $objUser3->setEmailAddress('dani@gmail.com');
        $objUser3->setDateAccountCreated('2022-06-06');
        $objUser3->setTimeAccountCreated('10:20:00');
        $objUser3->setDateLastLogin('2008-10-26');
        $objUser3->setTimeLastLogin('18:45:00');



        $objUser5 = new User($objPDO);
        $objUser5->setFirstName('Alice');
        $objUser5->setLastName('Johnson');
        $objUser5->setUsername('AliceJ');
        $objUser5->setPassword('PawordSecure');
        $objUser5->setEmailAddress('alice.j@example.com');      
        $objUser5->setDateAccountCreated('2021-11-02');
        $objUser5->setTimeAccountCreated('09:30:15');
        $objUser5->setDateLastLogin('2023-05-20');
        $objUser5->setTimeLastLogin('20:18:00');


        $objUser6 = new User($objPDO);
        $objUser6->setFirstName('Emma');
        $objUser6->setLastName('Smith');
        $objUser6->setUsername('EmmaS123');
        $objUser6->setPassword('StrongP@ss');
        $objUser6->setEmailAddress('emma.smith@example.com');
        $objUser6->setDateAccountCreated('2023-01-10');
        $objUser6->setTimeAccountCreated('12:15:20');
        $objUser6->setDateLastLogin('2023-09-05');
        $objUser6->setTimeLastLogin('16:28:45');


        //  $objUser3->Save();
        //  $objUser5->Save();
        // $objUser6->Save();



        print "USER 1";
        print "<hr>";

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


        print "USER 2";
        print "<hr>";

        print "ID: " . $objUser5->getID() . "<br />";
        print "First name is " . $objUser5->getFirstName() . "<br />";
        print "Last name is " . $objUser5->getLastName() . "<br />";
        print "Password is " . $objUser5->getPassword() . "<br />";
        print "Mail is " . $objUser5->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser5->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser5->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser5->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser5->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser5->getWrong()?:"---") . "<br />";


        print "USER 3";
        print "<hr>";

        print "ID: " . $objUser6->getID() . "<br />";
        print "First name is " . $objUser6->getFirstName() . "<br />";
        print "Last name is " . $objUser6->getLastName() . "<br />";
        print "Password is " . $objUser6->getPassword() . "<br />";
        print "Mail is " . $objUser6->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser6->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser6->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser6->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser6->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser6->getWrong()?:"---") . "<br />";


        print "<hr>";
        print "<hr>";

        print "MODIFICANDO";
        print "<hr>";

        
        $objUser3 = new User($objPDO,40);
        $objUser3->setFirstName('Dani2');
        $objUser3->setLastName('Sanchez2');
        $objUser3->setUsername('DanielSanchez2');
        $objUser3->setPassword('P@ssw0rd2');
        $objUser3->setEmailAddress('dani@gmail.com2');
        $objUser3->setDateAccountCreated('2022-06-02');
        $objUser3->setTimeAccountCreated('10:20:02');
        $objUser3->setDateLastLogin('2008-10-22');
        $objUser3->setTimeLastLogin('18:45:02');



        $objUser5 = new User($objPDO,41);
        $objUser5->setFirstName('Alice2');
        $objUser5->setLastName('Johnson2');
        $objUser5->setUsername('AliceJ2');
        $objUser5->setPassword('PawordSecure2');
        $objUser5->setEmailAddress('alice.j@example.com2');      
        $objUser5->setDateAccountCreated('2021-11-02');
        $objUser5->setTimeAccountCreated('09:30:12');
        $objUser5->setDateLastLogin('2023-05-22');
        $objUser5->setTimeLastLogin('20:18:02');


        $objUser6 = new User($objPDO,42);
        $objUser6->setFirstName('Emma2');
        $objUser6->setLastName('Smith2');
        $objUser6->setUsername('EmmaS1232');
        $objUser6->setPassword('StrongP@ss2');
        $objUser6->setEmailAddress('emma.smith@example.com2');
        $objUser6->setDateAccountCreated('2023-01-12');
        $objUser6->setTimeAccountCreated('12:15:22');
        $objUser6->setDateLastLogin('2023-09-02');
        $objUser6->setTimeLastLogin('16:28:42');
       
       
       
        $objUser3->Save();
        $objUser5->Save();
       $objUser6->Save();
       print "USER 1";
        print "<hr>";

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


        print "USER 2";
        print "<hr>";

        print "ID: " . $objUser5->getID() . "<br />";
        print "First name is " . $objUser5->getFirstName() . "<br />";
        print "Last name is " . $objUser5->getLastName() . "<br />";
        print "Password is " . $objUser5->getPassword() . "<br />";
        print "Mail is " . $objUser5->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser5->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser5->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser5->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser5->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser5->getWrong()?:"---") . "<br />";


        print "USER 3";
        print "<hr>";

        print "ID: " . $objUser6->getID() . "<br />";
        print "First name is " . $objUser6->getFirstName() . "<br />";
        print "Last name is " . $objUser6->getLastName() . "<br />";
        print "Password is " . $objUser6->getPassword() . "<br />";
        print "Mail is " . $objUser6->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser6->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser6->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser6->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser6->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser6->getWrong()?:"---") . "<br />";


        $objUser3->MarkForDeletion();

	unset($objUser3);

        $objUser5->MarkForDeletion();

	unset($objUser5);

        $objUser6->MarkForDeletion();

	unset($objUser6);