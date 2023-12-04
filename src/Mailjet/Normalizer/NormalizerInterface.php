<?php

namespace Mailjet\Normalizer;

use Mailjet\Response;

interface NormalizerInterface
{
    /**
     * @param Response $response
     * @return Response
     */
    public static function normalizeResponse(Response $response): Response;

    /**
     * @param array $data
     * @return bool
     */
    public static function shouldBeNormalized(array $data): bool;
}
