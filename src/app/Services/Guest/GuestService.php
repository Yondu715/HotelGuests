<?php

namespace App\Services\Guest;

use App\Dto\In\Guest\CreateGuestDto;
use App\Dto\In\Guest\GetGuestsDto;
use App\Dto\In\Guest\UpdateGuestDto;
use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

final class GuestService
{
    public function getAll(GetGuestsDto $getGuestsDto): LengthAwarePaginator
    {
        return Guest::query()->paginate(
            page: $getGuestsDto->page,
            perPage: $getGuestsDto->limit
        );
    }

    public function updateGuest(int $id, UpdateGuestDto $updateGuestDto): Guest
    {
        $guest = Guest::query()->findOrFail($id);

        $updateData = collect($updateGuestDto)
            ->filter(fn ($value) => !is_null($value))
            ->mapWithKeys(fn ($value, $key) => [Str::snake($key) => $value]);

        $guest->update($updateData->toArray());

        return $guest;
    }

    public function createGuest(CreateGuestDto $createGuestDto): Guest
    {
        return Guest::query()->create([
            'name' => $createGuestDto->name,
            'surname' => $createGuestDto->surname,
            'phone' => $createGuestDto->phone,
            'email' => $createGuestDto->email,
            'country' => Str::title($createGuestDto->country) ?: $this->getCountryFromPhoneNumber($createGuestDto->phone)
        ]);
    }

    public function getById(int $id): Guest
    {
        return Guest::query()->findOrFail($id);
    }

    public function deleteById(int $id): bool
    {
        $guest = Guest::query()->findOrFail($id);

        return $guest->delete();
    }

    private function getCountryFromPhoneNumber(string $phoneNumber): string
    {
        $countryCodes = [
            '7' => 'Россия',
            '1' => 'США',
            '44' => 'Великобритания',
            '49' => 'Германия',
            '33' => 'Франция',
        ];

        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        foreach ($countryCodes as $code => $country) {
            if (strpos($phoneNumber, $code) === 0) {
                return $country;
            }
        }

        return "Неизвестная страна";
    }
}
