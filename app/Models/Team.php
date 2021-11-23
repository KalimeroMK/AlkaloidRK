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
     * App\Models\Team
     *
     * @property int $id
     * @property string $birthday
     * @property string $slug
     * @property string $featured_image
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Collection|Language[] $team
     * @property-read int|null $team_count
     * @method static Builder|Team newModelQuery()
     * @method static Builder|Team newQuery()
     * @method static Builder|Team query()
     * @method static Builder|Team whereBirthday($value)
     * @method static Builder|Team whereCreatedAt($value)
     * @method static Builder|Team whereFeaturedImage($value)
     * @method static Builder|Team whereId($value)
     * @method static Builder|Team whereSlug($value)
     * @method static Builder|Team whereUpdatedAt($value)
     * @mixin Eloquent
     */
    class Team extends Model
    {
        use HasFactory;

        protected $table = 'teams';
        protected $fillable = ['birthday', 'featured_image', 'slug'];

        /**
         * @return BelongsToMany
         */
        public function Language(): BelongsToMany
        {
            return $this->belongsToMany(Language::class)->withPivot('name', 'lastname', 'bio', 'position', 'nationality');
        }

        /**
         * @return string
         */

        public function getImageUrlAttribute(): ?string
        {
            if (!empty($this->featured_image)) {
                return asset('/uploads/images/teams/medium/' . $this->featured_image);
            }

            if (!empty($this->image_old)) {
                return asset($this->image_old);
            }

            return asset('theme/images/team/FLP_1848.png');
        }
    }
