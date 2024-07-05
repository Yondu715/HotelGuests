<?php

namespace App\Dto\In\Guest;

use App\Http\Requests\Guest\GetGuestsRequest;

final class GetGuestsDto
{
    public function __construct(
        public readonly ?int $page,
        public readonly ?int $limit
    ) {
    }

    public static function fromRequest(GetGuestsRequest $getGuestsRequest): self
    {
        return new self(
            page: $getGuestsRequest->page,
            limit: $getGuestsRequest->limit
        );
    }
}
