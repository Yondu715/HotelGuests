<?php

namespace App\Dto\In\Guest;

use App\Http\Requests\Guest\CreateGuestRequest;

final class CreateGuestDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $surname,
        public readonly string $phone,
        public readonly string $email,
        public readonly ?string $country
    ) {
    }

    public static function fromRequest(CreateGuestRequest $createGuestRequest): self
    {
        return new self(
            name: $createGuestRequest->name,
            surname: $createGuestRequest->surname,
            phone: $createGuestRequest->phone,
            email: $createGuestRequest->email,
            country: $createGuestRequest->country
        );
    }
}
