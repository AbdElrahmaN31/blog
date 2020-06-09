<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        public function user(){
            return $this->belongsTo(User::class);
        }

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function addComment($body)
        {

            $this->comments()->create(compact('body'));

            /* The above EQUAL
             $this->comments()->create(['body' => $body])*/;

            /* This is the traditional way to create a new comment
             * Comment::create([
                'body' => $body,
                'post_id' => $this->id
               ]);
            */

        }
    }
