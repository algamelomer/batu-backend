<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class PostController extends Controller
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
            'file' => 'required',
            'type' => 'required|in:article,news,letter,data_show',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $posts = $this->getAllWithRelation(new Post, 'postFiles', 'id', 'title', 'description', 'type', 'user_id');

            $postsByType = [
                'article' => [],
                'news' => [],
                'letter' => [],
                'data_show' => []
            ];

            foreach ($posts as $post) {
                $formattedPost = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'files' => $post->postFiles->pluck('file')->toArray(),
                    'type' => $post->type,
                    'user_id' => $post->user_id,
                ];

                $postsByType[$post->type][] = $formattedPost;
            }

            // Sort posts by the latest
            foreach ($postsByType as $type => $posts) {
                usort($postsByType[$type], function ($a, $b) {
                    return $b['id'] <=> $a['id'];
                });
            }

            return response()->json($postsByType, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch posts. Please try again later.'], 500);
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

            $fileType = GetTypeFile($request->file('file'));
            $data = $request->only(['title', 'description', 'type', 'user_id']);
            $data['file'] = $this->createFile($request, 'file', $request->title, $fileType);
            $data['file_type'] = $fileType;

            $post = $this->createRecord(new Post, $data);

            $fileData = [
                'file' => $this->createFile($request, 'file', $request->title, $fileType),
                'file_type' => $fileType,
                'post_id' => $post->id
            ];

            $postFile = $this->createRecord(new PostFile, $fileData);

            return response()->json(['post' => $post, 'post_file' => $postFile, 'message' => 'Post created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create post. Please try again later.'], 500);
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
            $post = $this->findWithRelation(new Post, 'postFiles', $id);

            $formattedPost = [
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'files' => $post->postFiles->pluck('file')->toArray(),
                'type' => $post->type,
                'user_id' => $post->user_id,
            ];

            return response()->json(['post' => $formattedPost], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested post was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch post details. Please try again later.'], 500);
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
            $fileType = GetTypeFile($request->file('file'));
            $data['file'] = $this->updateFile($request, 'file', $post->postFiles->first()->file, $request->title, $fileType);

            if ($request->file !== $post->postFiles->first()->file) {
                $data['file_type'] = $fileType;
            } else {
                $data['file_type'] = $post->postFiles->first()->file_type;
            }

            $this->updateRecord(new Post, $post->id, $data);

            $fileData = [
                'file' => $this->updateFile($request, 'file', $post->postFiles->first()->file, $request->title, $fileType),
                'file_type' => $fileType,
            ];

            $this->updateRecord(new PostFile, $post->postFiles->first()->id, $fileData);

            return response()->json(['post' => $post, 'message' => 'Post updated successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update post. Please try again later.'], 500);
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
            $this->deleteRecord($post->postFiles->first(), 'file');
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete post. Please try again later.'], 500);
        }
    }
}
