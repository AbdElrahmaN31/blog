<?php

    namespace Tests\Unit;

    use App\Post;
    use Carbon\Carbon;
    use Illuminate\Foundation\Testing\DatabaseTransactions;
    use Tests\TestCase;

    class ExampleTest extends TestCase
    {
        use DatabaseTransactions;

        /**
         * A basic test example.
         *
         * @return void
         */
        public function testBasicTest()
        {
            //Given I have two records in the database that are posts,
            // and each one is posted a month apart
            $first = factory(Post::class)->create();

            $second = factory(Post::class)->create([
                'created_at' => Carbon::now()->subMonth()
            ]);

            //when I fetch the archives
            $posts = Post::archives();

            //then the response should be in the proper format
            $this->assertEquals([
                    [
                        "year" => $first->created_at->format('Y'),
                        "month" => $first->created_at->format('F'),
                        "Published" => 1
                    ], [
                        "year" => $second->created_at->format('Y'),
                        "month" => $second->created_at->format('F'),
                        "Published" => 1
                    ]
                ],$posts);
        }
    }
