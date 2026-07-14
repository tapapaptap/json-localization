<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Language\LanguageResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'progress' => 0,
            'languages' => [
                'source' => new LanguageResource($this->sourceLanguage),
                'target' => LanguageResource::collection($this->whenLoaded('targetLanguages')),
            ],
            'documents' => [],
            'performers' => [],
            'settings' => [
                'useMachineTranslate' => $this->use_machine_translate
            ],
            'createdAt' => Carbon::parse($this->created_at->format('d-m-y H:i')),
        ];
    }
}
