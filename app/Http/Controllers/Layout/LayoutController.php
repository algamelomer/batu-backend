<?php

namespace App\Http\Controllers\Layout;

use App\Models\SocialLinks;
use App\Models\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;

class LayoutController extends Controller
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
            $faculties = Faculty::with(['department:id,name,faculty_id'])->select('id', 'name')->get();
            $socialLinks = $this->getRecord(new SocialLinks, ['id', 'title', 'image', 'link', 'user_id']);

            return response()->json(['socialLinks' => $socialLinks, 'faculties' => $faculties], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
