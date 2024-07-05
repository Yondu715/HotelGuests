<?php

namespace App\Dto\In\Guest;

use App\Http\Requests\Guest\UpdateGuestRequest;

final class UpdateGuestDto
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $surname,
        public readonly ?string $phone,
        public readonly ?string $email,
        public readonly ?string $country
    ) {
    }

    public static function fromRequest(UpdateGuestRequest $updateGuestRequest): self
    {
        return new self(
            name: $updateGuestRequest->name,
            surname: $updateGuestRequest->surname,
            phone: $updateGuestRequest->phone,
            email: $updateGuestRequest->email,
            country: $updateGuestRequest->country
        );
    }
}
