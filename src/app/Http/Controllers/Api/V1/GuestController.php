<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use App\Dto\In\Guest\GetGuestsDto;
use App\Dto\In\Guest\CreateGuestDto;
use App\Dto\In\Guest\UpdateGuestDto;
use App\Http\Controllers\Controller;
use App\Services\Guest\GuestService;
use App\Http\Resources\Guest\GuestResource;
use App\Http\Requests\Guest\GetGuestsRequest;
use App\Http\Requests\Guest\CreateGuestRequest;
use App\Http\Requests\Guest\UpdateGuestRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GuestController extends Controller
{
    public function __construct(
        private readonly GuestService $guestService
    ) {
    }


    public function index(GetGuestsRequest $getGuestsRequest): AnonymousResourceCollection
    {
        $getGuestsDto = GetGuestsDto::fromRequest($getGuestsRequest);

        return GuestResource::collection(
            $this->guestService->getAll($getGuestsDto)
        );
    }


    public function store(CreateGuestRequest $createGuestRequest): GuestResource
    {
        $createGuestDto = CreateGuestDto::fromRequest($createGuestRequest);

        return GuestResource::make(
            $this->guestService->createGuest($createGuestDto)
        );
    }

    public function show(int $id): GuestResource
    {
        return GuestResource::make(
            $this->guestService->getById($id)
        );
    }


    public function update(int $id, UpdateGuestRequest $updateGuestRequest): GuestResource
    {
        $updateGuestDto = UpdateGuestDto::fromRequest($updateGuestRequest);

        return GuestResource::make(
            $this->guestService->updateGuest($id, $updateGuestDto)
        );
    }


    public function destroy(int $id): Response
    {
        $this->guestService->deleteById($id);

        return response()->noContent();
    }
}
