<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\queryBuilder;


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
        return $qeury->withCount(['reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ])
        ->orderBy('reviews_count','desc');

    }
    public function scopeHighestRated(Builder $qeury, $from = null, $to = null): Builder  {
        return $qeury->withAvg(['reviews' => fn(Builder $q)
        => $this->dateRangeFilter($q, $from, $to)
       ], 'rating')
        ->orderBy('reviews_avg_rating', 'desc');
    }
        public function scopeMinReview(Builder $qeury, int $minReviews): Builder {
            return $qeury->having('reviews_count', '>=' , $minReviews);
    }
private function dateRangeFilter(Builder $query, $from = null, $to = null) {

      if ($from && !$to) {
         $query->where('created_at', '>=', $from);
          } elseif (!$from && $to) {
             $query->where('created_at', '<=', $to);
              } elseif ($from && $to) {
                 $query->whereBetween('created_at', [$from, $to]);
                  }
}


public function scopePopularLastMonth(Builder $query ): Builder {


 return $query->popular(now()->subMonth(), now())
 ->highestRated(now()->subMonth(), now())
 ->minReview(2);
}

public function scopePopularLast6Month(Builder $query ): Builder {


 return $query->popular(now()->subMonths(6), now())
 ->highestRated(now()->subMonths(6), now())
 ->minReview(5);
}
public function scopeHighestRatedLastMonth(Builder $query ): Builder {


 return $query->highestRated(now()->subMonth(), now())
 ->popular(now()->subMonth(), now())

 ->minReview(2);
}

public function scopeHighestRatedLast6Month(Builder $query ): Builder {


 return $query->highestRated(now()->subMonths(6), now())
 ->popular(now()->subMonths(6), now())

 ->minReview(5);
}

}




