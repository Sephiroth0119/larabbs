<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'excerpt', 'slug'];

    //$topic->category获取话题对应的分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //$topic->user获取话题的作者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query, $order)
    {
        //不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
    }

    public function scopeRecentReplied($query)
    {
        //当话题有新的回复的时候，将更新话题模型的reply_count属性，
        //此时会自动触发框架对数据updated_at时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        //按创建时间排序
        return $query->orderBy('created_at', 'desc');
    }
}