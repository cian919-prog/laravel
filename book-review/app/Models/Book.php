<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Book extends Model
{
    use HasFactory;

    public function reviews() {
        return $this->hasMany(Review::class);
    }


    public function scopeTitle(Builder  $qeury, string $title) : Builder {
        return $qeury->where('title', 'LIKE', '%'.$title.'%');
    }


    public function scopePopular(Builder $qeury, $from = null, $to = null,): Builder {
        return $qeury->withCount(['reviews' => fn(Builder $q) => $this->dataRangeFilter($q, $from, $to)
        ])
        ->orderBy('reviews_count','desc');

    }
    public function scopeHighestRated(Builder $qeury, $from = null, $to = null): Builder  {
        return $qeury->withAvg(['reviews' => fn(Builder $q)
        => $this->dataRangeFilter($q, $from, $to)
       ], 'rating')
        ->orderBy('reviews_avg_rating', 'desc');
    }
    private function dataRangeFilter(Builder $qeury, $from = null, $to = null ): Builder {
            if($from && !$to) {
                $qeury->where('created_at', '>=', $from);
            } elseif (!$from && $to) {
                $qeury->where('created_at', '<=', $to);
            }elseif ($from && $to) {
                $qeury->whereBetween('created_at', [$from, $to]);
            }
    }
    public function scopeMinRevies(Builder $qeury, int $minReviews): Builder {
            return $qeury->having('reviews_count', '>=' , $minReviews);
    }
}
