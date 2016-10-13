<?php
    session_start();
    include("mySQL_connection.inc.php");
    //set the RuName, RuName are associated with which page the eBay Consent Form
    //will be directed to

    if(!isset($_SESSION['userID']))
    {
        header("Location: importerPage.php");
    }
    else
    {
        $RuName = "Twizla_Pty_Ltd-TwizlaPt-2e13-4-tikjsk";
        //get the EBayAuthorized Token
        include_once 'ebayAPIIncludes/eBayImporter.php';

        if($token)
        {
            //after obtain the token, use it to get the selling list of this user from Ebay
            $verb = 'GetSellerList';
            $A_MONTH_TIMESTAMP = 24*60*60*30;
            $toTimeStamp = strtotime(date("Y-m-d H:i:s")) + $A_MONTH_TIMESTAMP;

            $requestXmlBody='<?xml version="1.0" encoding="utf-8"?>
                                <GetSellerListRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                                <DetailLevel>ReturnAll</DetailLevel>
                                <RequesterCredentials>
                                <eBayAuthToken>'.$token.'</eBayAuthToken>
                                </RequesterCredentials>
                             
                              <EndTimeFrom>'.date("Y-m-d").'T'.date("H:i:s").".005Z".'</EndTimeFrom>
                              <EndTimeTo>'.date("Y-m-d", $toTimeStamp).'T'.date("H:i:s",$toTimeStamp).".005Z".'</EndTimeTo>
                            <Pagination ComplexType="PaginationType">
                            <EntriesPerPage>2</EntriesPerPage>
                            <PageNumber>1</PageNumber>
                            </Pagination>
                            </GetSellerListRequest>';

/*                            '
                            <GetMyeBaySellingRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                            <RequesterCredentials>
                            <eBayAuthToken>'.$token.'</eBayAuthToken>
                            </RequesterCredentials>
                            <Version>663</Version>
                            <ActiveList>
                            <Sort>TimeLeft</Sort>
                            </ActiveList>
                            </GetMyeBaySellingRequest>';
                            <Pagination><EntriesPerPage>3</EntriesPerPage>
                            <PageNumber>1</PageNumber>
                            </Pagination>*/


            //Create a new eBay session with all details pulled in from included keys.php
            $session = new eBaySession($devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
            //send the request and get response
            $responseXml = $session->sendHttpRequest($requestXmlBody);
            if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
                die('<P>Error sending request');

            //Xml string is parsed and creates a DOM Document object
            $responseDoc = new DomDocument();
            $responseDoc->loadXML($responseXml);

            $itemArray = $responseDoc->getElementsByTagName('Item');

//            echo $requestXmlBody;
//            echo "<br/><br/><br/>";
//
//
            echo $responseXml;
            if($itemArray -> length != 0)
            {
                //import each item in the active list
                foreach($itemArray as $item)
                {
                    importItem($item);
                }


            }
            else
            {
                ?>
                <script type="text/javascript">
                    window.location='<?php echo $PROJECT_PATH;?>importerPage.php?message=There are no active selling item to import in your eBay account.';
                    </script>
                <?php
            }


        }
    }

    function importItem(DOMElement $item)
    {

        $itemTitle = $item->getElementsByTagName('Title')->item(0)->nodeValue;

        $itemDesc = $item->getElementsByTagName('Description')->item(0)->nodeValue;
//        $categoryType
        $buyPrice = $item->getElementsByTagName('BuyItNowPrice')->item(0)->nodeValue;
        $itemPostage = "Fixed Price AUD $".$item->getElementsByTagName('ShippingServiceCost')->item(0)->nodeValue;
        $itemCondition = "Good";
        $itemCategoryID = "";
        $itemVideo = "";
        $sellerID = $_SESSION['userID'];
        
        $itemCatchPhrase= "";
        $bidPrice = $item->getElementsByTagName('CurrentPrice')->item(0)->nodeValue;
        $listDuration = substr($item->getElementsByTagName('ListingDuration')->item(0)->nodeValue,0,5);
        $listedDate = date("Y-m-d H:i:s");
        $timeFinish = date("Y-m-d H:i:s", (strtotime($listedDate) + $listDuration * $A_DAY_TIMESTAMP));
        $quantity = $item->getElementsByTagName('Quantity')->item(0)->nodeValue;
        $pictureDetail = $item->getElementsByTagName('PictureURL')->item(0)->nodeValue;
//        $paymentMethods = $item->getElementsByTagName('PaymentMethods')->item(0)->nodeValue;

        var_dump($pictureDetail);
//        var_dump($paymentMethods);
//        $pictureLink = $pictureDetail.
//
//
//        $conn = dbConnect();
//        // prepare the query for adding new item into database
        $insertSQL = "INSERT INTO item (ItemTitle, ItemCategoryID, Description, Price, Postage, ItemCondition, VideoLink, SellerID, CatchPhrase, currentBid, listDuration, numberOfBid, listedDate, startingBid, timeFinish, Unsold, CategoryType, Quantity)
//        VALUE ('$itemTitle',$itemCategoryID,'$itemDesc',$buyPrice,'$itemPostage','$itemCondition','$itemVideo',$sellerID,'$itemCatchPhrase',$bidPrice,$listDuration,0,'$listedDate', $bidPrice, '$timeFinish', 0, '$categoryType', $quantity)";
//            $message[] = $insertSQL;
            echo $insertSQL;
//        mysql_query($insertSQL) or die(mysql_error());
//
//        //get the return itemID and start insert the item  picture links
//        $itemID = mysql_insert_id();
//        foreach($pictureLink as $link)
//        {
//            $insertSQL = "INSERT INTO picturelink (ItemID, PictureLink) VALUE($itemID,'$link')";
//            mysql_query($insertSQL) or die(mysql_error());
//        }
//
//        //record the pament method specified for this item
//        foreach($paymentMethods as $methodID)
//        {
//            $insertSQL = "INSERT INTO itempaymentmethod (ItemID, MethodID) VALUE ($itemID, $methodID)";
//
//            mysql_query($insertSQL) or die(mysql_error());
//        }
//
        mysql_close($conn);
    }
?>
