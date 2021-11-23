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
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property string $country
 * @property int|null $iso
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Language newModelQuery()
 * @method static Builder|Language newQuery()
 * @method static Builder|Language query()
 * @method static Builder|Language whereCountry($value)
 * @method static Builder|Language whereCreatedAt($value)
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereIso($value)
 * @method static Builder|Language whereName($value)
 * @method static Builder|Language whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $code
 * @property-read \Kalnoy\Nestedset\Collection|Category[] $category
 * @property-read int|null $category_count
 * @property-read Collection|Post[] $post
 * @property-read int|null $post_count
 * @method static Builder|Language whereCode($value)
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Category[] $score
 * @property-read int|null $score_count
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Category[] $team
 * @property-read int|null $team_count
 */
    class Language extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'iso', 'country'];

        /**
         * @return BelongsToMany
         */
        public function post(): BelongsToMany
        {
            return $this->belongsToMany(Post::class)->withPivot('name', 'description');
        }

        /**
         * @return BelongsToMany
         */
        public function score(): BelongsToMany
        {
            return $this->belongsToMany(Category::class)->withPivot('team1', 'team2');
        }

        /**
         * @return BelongsToMany
         */
        public function team(): BelongsToMany
        {
            return $this->belongsToMany(Category::class)->withPivot('name', 'lastname', 'bio', 'position', 'nationality');
        }
    }
