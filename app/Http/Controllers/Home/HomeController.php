<?php

namespace App\Http\Controllers\Home;

use App\Models\Detail;
use App\Models\Department;
use App\Models\UniversityLeaders;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;

class HomeController extends Controller
{
    use CrudOperationsTrait;

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $counter = $this->getRelatedData(new Detail, 'category', 'counter', ['id', 'title', 'image', 'counter_number']);
            $activity = $this->getRelatedData(new Detail, 'category', 'activity', ['id', 'title', 'image', 'description']);
            $departments = $this->getRecord(new Department, ['id', 'name', 'logo', 'description']);
            $posts = Post::where('type', 'news')->orderBy('created_at', 'desc')->take(10)->get();
            $UniversityPresident = $this->getRelatedData(new UniversityLeaders, 'position', 'President', ['id', 'name', 'image', 'description', 'word']);
            $UniversityVicePresident = $this->getRelatedData(new UniversityLeaders, 'position', 'Vice_President', ['id', 'name', 'image', 'description', 'word']);

            $news = [];
            foreach ($posts as $post) {
                $postData = $this->HandleRecord($post, ['id', 'title', 'description', 'user_id']);
                $imageUrl = $post->postMedia->first()->image ?? null;
                $news[] = array_merge($postData, ['image' => $imageUrl]);
            }

            return response()->json(['UniversityPresident' => $UniversityPresident, 'UniversityVicePresident' => $UniversityVicePresident, 'counter' => $counter, 'activity' => $activity, 'news' => $news, 'departments' => $departments], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
