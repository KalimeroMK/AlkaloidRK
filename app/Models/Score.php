<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Score
 *
 * @property int $id
 * @property string $date
 * @property int $team1goals
 * @property int $team2goals
 * @property string $team1logo
 * @property string $team2logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Language[] $language
 * @property-read int|null $language_count
 * @method static Builder|Score newModelQuery()
 * @method static Builder|Score newQuery()
 * @method static Builder|Score query()
 * @method static Builder|Score whereCreatedAt($value)
 * @method static Builder|Score whereDate($value)
 * @method static Builder|Score whereId($value)
 * @method static Builder|Score whereTeam1goals($value)
 * @method static Builder|Score whereTeam1logo($value)
 * @method static Builder|Score whereTeam2goals($value)
 * @method static Builder|Score whereTeam2logo($value)
 * @method static Builder|Score whereUpdatedAt($value)
 * @mixin Eloquent
 */
    class Score extends Model
    {
        use HasFactory;

        protected $table = 'scores';
        protected $fillable = ['team1goals', 'team2goals', 'team1logo', 'team2logo', 'date'];

        /**
         * @return BelongsToMany
         */
        public function language(): BelongsToMany
        {
            return $this->belongsToMany(Language::class)->withPivot('team1', 'team2');
        }
    }
