<?php
/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */

include 'vendor/autoload.php';

$client = new Dahua\TrackApi\Api\Client();

##
//print_r($client->track123('8fcb026eb6894f46994417b1da46b205')->registerTrackNo('9300110597203397770724'));

try {

//    print_r($client->track17('21C6DC3122C00AB93CCCBA37FD21D1C9')->getTrackInfo('9305510597202882413323'));
//    print_r($client->track17('21C6DC3122C00AB93CCCBA37FD21D1C9')->registerTrackNo('9305510597202882413323'));
//    print_r($client->track17('21C6DC3122C00AB93CCCBA37FD21D1C9')->registerTrackNo('9305510597202882413323'));

//    print_r($client->track718('370b22f0-b900-11ef-bfbd-cf4d51bb3e8f')->registerTrackNo('9305510597202882413323'));
    print_r($client->track718('370b22f0-b900-11ef-bfbd-cf4d51bb3e8f')->getTrackInfo('9305510597202882413323'));

}catch (Exception $e){
    echo $e->getMessage();
}
