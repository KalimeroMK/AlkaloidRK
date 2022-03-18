<?php

    namespace Modules\Setting\Models;

    use App\Traits\ClearsResponseCache;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Support\Carbon;
    use Modules\Language\Models\Language;

    /**
     * App\Models\Setting
     *
     * @property int $id
     * @property string $title
     * @property string $mainurl
     * @property string $email
     * @property string $description
     * @property string $logo
     * @property string $logomedium
     * @property string $logothumb
     * @property string $link
     * @property string $address
     * @property string $phone
     * @property string $twitter
     * @property string $facebook
     * @property string $skype
     * @property string $linkedin
     * @property string $gplus
     * @property string $youtube
     * @property string $flickr
     * @property string $pinterest
     * @property string $analytics_code
     * @property string $mailchimp_form
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int $show_big_sharing
     * @method static Builder|Setting newModelQuery()
     * @method static Builder|Setting newQuery()
     * @method static Builder|Setting query()
     * @method static Builder|Setting whereAddress($value)
     * @method static Builder|Setting whereAnalyticsCode($value)
     * @method static Builder|Setting whereCreatedAt($value)
     * @method static Builder|Setting whereDescription($value)
     * @method static Builder|Setting whereEmail($value)
     * @method static Builder|Setting whereFacebook($value)
     * @method static Builder|Setting whereFlickr($value)
     * @method static Builder|Setting whereGplus($value)
     * @method static Builder|Setting whereId($value)
     * @method static Builder|Setting whereLink($value)
     * @method static Builder|Setting whereLinkedin($value)
     * @method static Builder|Setting whereLogo($value)
     * @method static Builder|Setting whereLogomedium($value)
     * @method static Builder|Setting whereLogothumb($value)
     * @method static Builder|Setting whereMailchimpForm($value)
     * @method static Builder|Setting whereMainurl($value)
     * @method static Builder|Setting wherePhone($value)
     * @method static Builder|Setting wherePinterest($value)
     * @method static Builder|Setting whereShowBigSharing($value)
     * @method static Builder|Setting whereSkype($value)
     * @method static Builder|Setting whereTitle($value)
     * @method static Builder|Setting whereTwitter($value)
     * @method static Builder|Setting whereUpdatedAt($value)
     * @method static Builder|Setting whereYoutube($value)
     * @mixin Eloquent
     */
    class Setting extends Model
    {
        use ClearsResponseCache;
        use HasFactory;

        protected $table = 'settings';
        protected $fillable = [
            'mainurl',
            'email',
            'featured_image',
            'link',
            'phone',
            'twitter',
            'facebook',
            'skype',
            'youtube',
            'linkedin',
            'flickr',
            'pinterest',
            'analytics_code',
            'mailchimp_form',
            'gplus',
        ];

        /**
         * @return BelongsToMany
         */
        public function language(): BelongsToMany
        {
            return $this->belongsToMany(Language::class)->withPivot('title', 'description', 'address');
        }

        /**
         * @return string|null
         */

        public function getImageUrlAttribute(): ?string
        {
            if ( ! empty($this->featured_image)) {
                return asset('/uploads/images/logo/medium/'.$this->featured_image);
            }

            return asset('theme/images/team/FLP_1848.png');
        }
    }
