<?php

    namespace App\Observers;

    use App\Models\Team;
    use Illuminate\Support\Str;

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