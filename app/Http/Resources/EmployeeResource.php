<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    // public $status;
    // public $message;
    // public $resource;

    // public function __construct($status, $message)
    // {
    //     parent::__construct($resource);
    //     $this->status  = $status;
    // }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'position_id' => $this->position_id,
            'division_id' => $this->division_id,
            'name' => $this->name,
            'position' => new PositionResource($this->position),
            'division' => new DivisionResource($this->division),
        ];
    }
}
