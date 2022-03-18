<?php

    namespace Modules\Youtube\Models;

    use Cohensive\Embed\Facades\Embed;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Youtube
     *
     * @property int $id
     * @property string $url
     * @property string $title
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static Builder|Youtube newModelQuery()
     * @method static Builder|Youtube newQuery()
     * @method static Builder|Youtube query()
     * @method static Builder|Youtube whereCreatedAt($value)
     * @method static Builder|Youtube whereId($value)
     * @method static Builder|Youtube whereTitle($value)
     * @method static Builder|Youtube whereUpdatedAt($value)
     * @method static Builder|Youtube whereUrl($value)
     * @mixin Eloquent
     * @property-read string $video_html
     */
    class Youtube extends Model
    {
        use HasFactory;

        protected $table = 'youtubes';
        protected $fillable = ['title', 'url'];

        public function getVideoHtmlAttribute(): string
        {
            $embed = Embed::make($this->url)->parseUrl();
            if ( ! $embed) {
                return '';
            }

            $embed->setAttribute(['width' => 970]);

            return $embed->getHtml();
        }

    }
