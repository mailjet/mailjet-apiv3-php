<?php

namespace Mailjet\Normalizer;

use Mailjet\Response;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class ContactNormalizer implements NormalizerInterface
{
    /**
     * @param Response $response
     * @return Response
     */
    public static function normalizeResponse(Response $response): Response
    {
        if (!$response->getData()) {
            $response->setData($response->getBody());
        }
        return $response;
    }

    /**
     * @param array $data
     * @return bool
     */
    public static function shouldBeNormalized(array $data): bool
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($data, self::getValidationRule());
        return 0 === count($violations);
    }

    /**
     * @return Assert\Collection
     */
    private static function getValidationRule(): Assert\Collection
    {
        return new Assert\Collection([
            'fields' => [
                'filters' => new Assert\Collection([
                    'fields' => [
                        'countonly' => new Assert\Length(['min' => 1]),
                    ],
                    'allowExtraFields' => true,
                ]),
            ],
            'allowExtraFields' => true,
        ]);
    }
}
