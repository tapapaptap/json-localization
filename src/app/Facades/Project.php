<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Project extends Facade
{
    /**
    * @method \App\Service\Project\ProjectService setProject(\App\Model\Project $project)
    * @method static \App\Model\Project update(array $data)
    * 
    * @see \App\Service\Project\ProjectService
    */
    protected static function getFacadeAccessor(): string
    {
        //
        return 'project_service';
    }
}
