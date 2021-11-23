<?php

    namespace App\Models;

    use App\Traits\ClearsResponseCache;
    use Eloquent;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Support\Carbon;
    use Kalnoy\Nestedset\Collection;
    use Kalnoy\Nestedset\NodeTrait;
    use Kalnoy\Nestedset\QueryBuilder;

    /**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $publish
 * @property int|null $parent_id
 * @property int|null $_lft
 * @property int|null $_rgt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Language[] $language
 * @property-read int|null $language_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Post[] $post
 * @property-read int|null $post_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Post[] $posts
 * @property-read int|null $posts_count
 * @method static Collection|static[] all($columns = ['*'])
 * @method static QueryBuilder|Category ancestorsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category ancestorsOf($id, array $columns = [])
 * @method static QueryBuilder|Category applyNestedSetScope(?string $table = null)
 * @method static QueryBuilder|Category countErrors()
 * @method static QueryBuilder|Category d()
 * @method static QueryBuilder|Category defaultOrder(string $dir = 'asc')
 * @method static QueryBuilder|Category descendantsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static QueryBuilder|Category fixSubtree($root)
 * @method static QueryBuilder|Category fixTree($root = null)
 * @method static Collection|static[] get($columns = ['*'])
 * @method static QueryBuilder|Category getNodeData($id, $required = false)
 * @method static QueryBuilder|Category getPlainNodeData($id, $required = false)
 * @method static QueryBuilder|Category getTotalErrors()
 * @method static QueryBuilder|Category hasChildren()
 * @method static QueryBuilder|Category hasParent()
 * @method static QueryBuilder|Category isBroken()
 * @method static QueryBuilder|Category leaves(array $columns = [])
 * @method static QueryBuilder|Category makeGap(int $cut, int $height)
 * @method static QueryBuilder|Category moveNode($key, $position)
 * @method static QueryBuilder|Category newModelQuery()
 * @method static QueryBuilder|Category newQuery()
 * @method static QueryBuilder|Category orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static QueryBuilder|Category orWhereDescendantOf($id)
 * @method static QueryBuilder|Category orWhereNodeBetween($values)
 * @method static QueryBuilder|Category orWhereNotDescendantOf($id)
 * @method static QueryBuilder|Category query()
 * @method static QueryBuilder|Category rebuildSubtree($root, array $data, $delete = false)
 * @method static QueryBuilder|Category rebuildTree(array $data, $delete = false, $root = null)
 * @method static QueryBuilder|Category reversed()
 * @method static QueryBuilder|Category root(array $columns = [])
 * @method static QueryBuilder|Category whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static QueryBuilder|Category whereAncestorOrSelf($id)
 * @method static QueryBuilder|Category whereCreatedAt($value)
 * @method static QueryBuilder|Category whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static QueryBuilder|Category whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static QueryBuilder|Category whereId($value)
 * @method static QueryBuilder|Category whereIsAfter($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsBefore($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsLeaf()
 * @method static QueryBuilder|Category whereIsRoot()
 * @method static QueryBuilder|Category whereLft($value)
 * @method static QueryBuilder|Category whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static QueryBuilder|Category whereNotDescendantOf($id)
 * @method static QueryBuilder|Category whereParentId($value)
 * @method static QueryBuilder|Category wherePublish($value)
 * @method static QueryBuilder|Category whereRgt($value)
 * @method static QueryBuilder|Category whereSlug($value)
 * @method static QueryBuilder|Category whereTitle($value)
 * @method static QueryBuilder|Category whereUpdatedAt($value)
 * @method static QueryBuilder|Category withDepth(string $as = 'depth')
 * @method static QueryBuilder|Category withoutRoot()
 * @mixin Eloquent
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 */
    class Category extends Model
    {
        use ClearsResponseCache;
        use NodeTrait;
        use HasFactory;

        protected $table = 'categories';
        protected $fillable = ['title', 'slug', 'parent_id'];

        /**
         * @return string
         */
        public static function getTree()
        {
            $categories = self::get()->toTree();
            $traverse = function($categories, $prefix = '') use (&$traverse, &$allCats) {
                foreach ($categories as $category) {
                    $allCats[] = ["title" => $prefix . ' ' . $category->title, "id" => $category->id];
                    $traverse($category->children, $prefix . '-');
                }
                return $allCats;
            };
            return $traverse($categories);
        }

        /**
         * @return string
         */
        public static function getList(): string
        {
            $categories = self::get()->toTree();
            $lists = '<li class="list-unstyled">';
            foreach ($categories as $category) {
                $lists .= self::renderNodeHP($category);
            }
            $lists .= "</li>";
            return $lists;
        }

        /**
         * @param $node
         * @return string
         */
        public static function renderNodeHP($node): string
        {
            $list = '<li class="dropdown-item"><a class="nav-link" href="/categories/' . $node->slug . '">' . $node->title . '</a>';
            if ($node->children()->count() > 0) {
                $list .= '<ul class="dropdown-menu">';
                foreach ($node->children as $child) {
                    $list .= self::renderNodeHP($child);
                }
                $list .= "</ul>";
            }
            $list .= "</li>";
            return $list;
        }

        /**
         * @return HasMany
         */
        public function post(): HasMany
        {
            return $this->hasMany(Post::class, 'category_id');
        }

        /**
         * @return BelongsToMany
         */
        public function posts(): BelongsToMany
        {
            return $this->belongsToMany(Post::class);
        }
        
        /**
         * @return string
         */
        public function getParentsNames()
        {
            if ($this->parent) {
                return $this->parent->getParentsNames();
            } else {
                return $this->title;
            }
        }
    }
