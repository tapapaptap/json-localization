<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Language\LanguageResource;
use Illuminate\Support\Carbon;

class MinifiedProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'languages' => [
                'source' => new LanguageResource($this->sourceLanguage),
                'target' => LanguageResource::collection($this->whenLoaded('targetLanguages')),
            ],
            'performersCount' => 0,
            'documentsCount' => 0,
            'usedMachineTranslate' => $this->use_machine_translate,
            'createdAt' => Carbon::parse($this->created_at->format('d-m-y H:i')),
        ];
    }
}
