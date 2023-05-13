<?php

namespace App\Http\Resources;

use App\Models\Category;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CategoryProductResource;
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

        $products = $this->products(); 
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => asset('storage/'.$this->photo),
            'created_at' => $this->created_at,
            'created_at_diff' => $this->created_at->diffForHumans(now(), CarbonInterface::DIFF_ABSOLUTE), // param-3 = true for short term
            'products_count' => $products->count(),
            'products' => !empty($products) ? CategoryProductResource::collection($products->get()) : [1],
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
