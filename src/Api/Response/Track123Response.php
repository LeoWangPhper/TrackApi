<?php
namespace Dahua\TrackApi\Api\Response;

/**
 * ${PARAM_DOC}
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author Leo.Wang@php
 */
class Track123Response
{
    /**
     * @param array $response
     * @return array
     */
    public function response(array $response): array
    {
        return is_array($response)?$response:[];
    }
}
