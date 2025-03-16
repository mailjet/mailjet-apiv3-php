<?php

namespace Mailjet\Model;

interface DtoInterface
{
    /**
     * @param array $data
     * @return DtoInterface
     */
    public static function fromArray(array $data): self;

    /**
     * @return array
     */
    public function toArray(): array;
}