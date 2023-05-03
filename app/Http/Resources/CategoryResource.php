<?php

namespace App\Http\Resources;

use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'created_at_diff' => $this->created_at->diffForHumans(now(), CarbonInterface::DIFF_ABSOLUTE) // param-3 = true for short term
        ];
    }

    /**
     * Customize the outgoing response for the resource.
     * its work without collections
     */
    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('X-Value', 'Value X');
    }
}
