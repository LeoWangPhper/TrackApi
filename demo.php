<?php
/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */

include 'vendor/autoload.php';

$client = new Dahua\TrackApi\Api\Client();

$client->track123('8fcb026eb6894f46994417b1da46b205')->registerTrackNo('9300110597203397770724');
