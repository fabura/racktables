<?php
/** User: bfattahov Date: 17.06.13 */


class HPWarrancyTime
{
    static function getWarranty($serialNumber, $productNumber)
    {
        $page = self::retrievePage($serialNumber, $productNumber);
        $warrancyTime = self::parsePage($page);
        return $warrancyTime;
    }

    private static function retrievePage($serialNumber, $productNumber)
    {
        if ($curl = curl_init()) {
            $url = "http://h20000.www2.hp.com/bizsupport/TechSupport/WarrantyResults.jsp?nickname=&sn=$serialNumber&country=RU&lang=en&cc=us&pn=$productNumber&find=Display+Warranty+Information+%C2%BB&";
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $out = curl_exec($curl);
            curl_close($curl);
            return $out;
        }
        throw new Exception("Could not initialize curl!");
    }

    private static function parsePage($page)
    {
        $regexp = '/<td class=small width=350 bgcolor="E7E7E7">((\d+) (\S+) (\d{4}))<\/td>/';
        preg_match_all($regexp, $page, $matches);
        $dates = array();
        if (count($matches)) {
            foreach ($matches[1] as $dateString) {
                $dates[] =strtotime($dateString);
            }
        sort($dates);
        return $dates[count($dates)-1];
        }
        return 0;
    }
}