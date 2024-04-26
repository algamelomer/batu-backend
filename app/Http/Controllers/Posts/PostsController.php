<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Models\PostMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;

class PostsController extends Controller
{
    use CrudOperationsTrait;
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | Validate Request Data Function
    |--------------------------------------------------------------------------
    */
    private function validator($request)
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable',
            'video' => 'nullable',
            'type' => 'required|in:article,news',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Display Articles Function
    |--------------------------------------------------------------------------
    */
    public function displayArticles()
    {
        try {
            $posts = Post::where('type', 'article')->orderBy('created_at', 'desc')->get();
            $articles = [];

            foreach ($posts as $post) {
                $postData = $this->HandleRecord($post, ['id', 'title', 'description', 'user_id']);
                $imageUrl = $post->postMedia->first()->image ?? null;
                $articles[] = array_merge($postData, ['image' => $imageUrl]);
            }

            return response()->json(['data' => $articles], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Display News Function
    |--------------------------------------------------------------------------
    */

    public function displayNews()
    {
        try {
            $posts = Post::where('type', 'news')->orderBy('created_at', 'desc')->get();
            $news = [];

            foreach ($posts as $post) {
                $postData = $this->HandleRecord($post, ['id', 'title', 'description', 'user_id']);
                $imageUrl = $post->postMedia->first()->image ?? null;
                $news[] = array_merge($postData, ['image' => $imageUrl]);
            }

            return response()->json(['data' => $news], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Show Function
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        try {
            $post = $this->findWithRelation(new Post, ['postMedia'], $id);
            return response()->json(['data' => $post], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Store Function
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'type', 'user_id']);
            $post = $this->createRecord(new Post, $data);

            // Handle post media files if provided
            if ($request->has('image') || $request->has('video')) {
                $mediaData = [];
                if ($request->has('image')) {
                    $mediaData['image'] = $this->createFile($request, 'image', $request->title, 'image');
                }
                if ($request->has('video')) {
                    $mediaData['video'] = $this->createFile($request, 'video', $request->title, 'video');
                }
                $mediaData['post_id'] = $post->id;
                $postMedia = $this->createRecord(new PostMedia, $mediaData);
                $post->postMedia()->save($postMedia);
            }

            return response()->json(['data' => $post, 'message' => 'Post created successfully'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Post $post)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'type', 'user_id']);
            $this->updateRecord(new Post, $post->id, $data);

            // Handle post media files if provided
            if ($request->has('image') || $request->has('video')) {
                $mediaData = [];
                if ($request->has('image')) {
                    $mediaData['image'] = $this->updateFile($request, 'image', $post->postMedia->image, $request->title, 'image');
                }
                if ($request->has('video')) {
                    $mediaData['video'] = $this->updateFile($request, 'video', $post->postMedia->video, $request->title, 'video');
                }
                $post->postMedia()->update($mediaData);
            }

            return response()->json(['data' => $post, 'message' => 'Post updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(Post $post)
    {
        try {
            return $this->deleteRecord($post, 'postMedia');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
