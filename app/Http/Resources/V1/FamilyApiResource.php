<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class FamilyApiResource extends JsonResource
{
    /**

     * Transform the resource into an array.
     *
     * @property int $id
     * */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'family',
            'id' => $this->id,
            'attributes' => [
                'id' => $this->id,
                'name' => $this->name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ],
            'links' => [
                'self' => route('families.show', $this->id),
            ],
            'relationships' => [
                'user'=>[
                    'links' => [
                        'self' => "User Link for user",
                    ]
                ]
            ]
        ];
    }
}
