<?php

    namespace App;

    use Carbon\Carbon;

    class Post extends Model
    {
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function addComment($body, $user_id)
        {

            $this->comments()->create(compact(['body', 'user_id']));
            /* The above EQUAL
             $this->comments()->create(['body' => $body])*/;

            /* This is the traditional way to create a new comment
             * Comment::create([
                'body' => $body,
                'post_id' => $this->id
               ]);
            */

        }

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function scopeFilter($query, $filters)
        {

            if (!empty($filters)) {
                if ($month = $filters['month']) {
                    $query->whereMonth('created_at', Carbon::parse($month)->month);
                }

                if ($year = $filters['year']) {
                    $query->whereYear('created_at', $year);
                }
            }
        }
    }
