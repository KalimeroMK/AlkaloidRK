<?php

    namespace App\Modules\Team\Observers;

    use Illuminate\Support\Str;
    use Modules\Team\Models\Team;

    class TeamObserver
    {
        public function creating(Team $team)
        {
            $team->slug = Str::slug(array_first((array)$team->slug));
        }

        public function updating(Team $team)
        {
            $team->slug = Str::slug(array_first((array)$team->slug));
        }

    }