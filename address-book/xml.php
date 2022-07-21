<?php
 include 'connect.php';
 $fire=mysqli_query($conn,"select * from information");
 $xml= new XMLWriter();
 $xml->openURI("php://output");
 $xml->startDocument();
 $xml->setIndent(true);
 $xml->startElement('information');
    while($row=mysqli_fetch_assoc($fire)){
        $xml->startElement('address');
            $xml->startElement('name');
            $xml->writeRaw($row['name']);
            $xml->endElement();
            $xml->startElement('fname');
            $xml->writeRaw($row['fname']);
            $xml->endElement();
            $xml->startElement('email');
            $xml->writeRaw($row['email']);
            $xml->endElement();
            $xml->startElement('street');
            $xml->writeRaw($row['street']);
            $xml->endElement();
            $xml->startElement('zipcode');
            $xml->writeRaw($row['zipcode']);
            $xml->endElement();
            $xml->startElement('city');
            $xml->writeRaw($row['city']);
            $xml->endElement();
        $xml->endElement();
    }
 $xml->endElement();
 header('Content-type: text/xml');
 $xml->flush();


?>