<?php

    namespace Modules\Category\Models;

    use Database\Factories\CategoryPostFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\CategoryPost
     *
     * @property int $id
     * @property int $post_id
     * @property int $category_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static Builder|CategoryPost newModelQuery()
     * @method static Builder|CategoryPost newQuery()
     * @method static Builder|CategoryPost query()
     * @method static Builder|CategoryPost whereCategoryId($value)
     * @method static Builder|CategoryPost whereCreatedAt($value)
     * @method static Builder|CategoryPost whereId($value)
     * @method static Builder|CategoryPost wherePostId($value)
     * @method static Builder|CategoryPost whereUpdatedAt($value)
     * @mixin Eloquent
     */
    class CategoryPost extends Model
    {
        use HasFactory;

        protected static function Factory(): CategoryPostFactory
        {
            return CategoryPostFactory::new();
        }

        protected $table = 'category_post';
        protected $fillable = ['post_id', 'category_id'];
    }