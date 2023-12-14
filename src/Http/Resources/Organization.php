<?php

namespace Fleetbase\Http\Resources;

use Fleetbase\Support\Http;
use Fleetbase\Models\Setting;


class Organization extends FleetbaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->when(Http::isInternalRequest(), $this->id, $this->public_id),
            'uuid'         => $this->when(Http::isInternalRequest(), $this->uuid),
            'public_id'    => $this->when(Http::isInternalRequest(), $this->public_id),
            'name'         => $this->name,
            'description'  => $this->description,
            'phone'        => $this->phone,
            'timezone'     => $this->timezone,
            'logo_url'     => $this->logo_url,
            'backdrop_url' => $this->backdrop_url,
            'branding'     => Setting::getBranding(),
            'options'      => $this->options,
            'slug'         => $this->slug,
            'status'       => $this->status,
            'updated_at'   => $this->updated_at,
            'created_at'   => $this->created_at,
        ];
    }
}
