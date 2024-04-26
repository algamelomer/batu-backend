<?php

namespace App\Traits;

use App\Models\StaffSocial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

trait CrudOperationsTrait
{

    /*
    |--------------------------------------------------------------------------
    | Validate Request Data
    |--------------------------------------------------------------------------
    */
    public function validateRequestData($request, $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Retrieve all records with relation
    |--------------------------------------------------------------------------
    */
    public function getAllWithRelation($model, $relation, $columns)
    {
        return $model::with($relation)->get($columns);
    }

    /*
    |--------------------------------------------------------------------------
    | Retrieve records by Column
    |--------------------------------------------------------------------------
    */
    public function getRelatedData($model, $FR, $id, $columns)
    {
        return $model::where($FR, $id)->get($columns);
    }

    /*
    |--------------------------------------------------------------------------
    | Retrieve all records
    |--------------------------------------------------------------------------
    */
    public function getRecord($model, $columns)
    {
        if (empty($columns)) {
            return $model::all();
        } else {
            return $model::get($columns);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Handle Record records
    |--------------------------------------------------------------------------
    */
    public function HandleRecord($record, $columns)
    {
        // If the record is a collection, iterate over it
        if ($record instanceof Collection) {
            $data = [];
            foreach ($record as $subRecord) {
                $recordData = [];
                foreach ($columns as $column) {
                    $recordData[$column] = $subRecord->$column ?? null;
                }
                $data[] = $recordData;
            }
            return $data;
        } else {
            $data = [];
            foreach ($columns as $column) {
                $data[$column] = $record->$column ?? null;
            }
            return $data;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Find record with relation by ID
    |--------------------------------------------------------------------------
    */
    public function findWithRelation($model, $relation, $id)
    {
        return $model::with($relation)->findOrFail($id);
    }

    /*
    |--------------------------------------------------------------------------
    | Find record by ID
    |--------------------------------------------------------------------------
    */
    public function findById($model, $id)
    {
        return $model::findOrFail($id);
    }


    /*
    |--------------------------------------------------------------------------
    | Insert Social to record
    |--------------------------------------------------------------------------
    */
    public function insertSocial($request, $FK, $id)
    {
        $recordSocial = ['Facebook', 'Instagram', 'X', 'LinkedIN', 'GitHub'];

        foreach ($recordSocial as $record) {
            $link = $request->input($record);
            if ($link) {
                $image = $this->imageSocial($record);
                StaffSocial::create([
                    'name' => $record,
                    'link' => $link,
                    'image' => $image,
                    'user_id' => $request->user_id,
                    $FK => $id
                ]);

            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Social to record
    |--------------------------------------------------------------------------
    */
    public function updateSocialLinks($request, $staffProgramId)
    {
        $recordSocial = ['Facebook', 'Instagram', 'X', 'LinkedIN', 'GitHub'];
        foreach($recordSocial as $record){
            $link = $request->input($record);
            if ($link) {
                $socialImage = $this->imageSocial($record);
                StaffSocial::updateOrCreate(
                    ['staff_programs_id' => $staffProgramId, 'name' => $record],
                    ['link' => $link, 'image' => $socialImage, 'user_id' => $request->user_id]
                );
            }
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Create a new record
    |--------------------------------------------------------------------------
    */
    public function createRecord($model, $data)
    {
        return $model::create($data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update an existing record
    |--------------------------------------------------------------------------
    */
    public function updateRecord($model, $id, $data)
    {
        $record = $model::findOrFail($id);
        if (!$record) {
            return response()->json(['error' => 'Failed to update record', 'details' => 'The requested record was not found.'], 404);
        } else {
            $record->update($data);
            return $record;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Delete a record
    |--------------------------------------------------------------------------
    */
    public function deleteRecord($element, ...$records)
    {
        foreach ($records as $record) {
            $filePath = $element->$record;
            $this->deleteFile($filePath);
        }
        $element->delete();
    }


    /*
    |--------------------------------------------------------------------------
    | Helper Function for Determine Folder
    |--------------------------------------------------------------------------
    */
    private function  findFolder($fileName)
    {
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $folders = [
            'jpg' => 'images', 'jpeg' => 'images', 'png' => 'images', 'svg' => 'images', 'mp4' => 'video', 'pdf' => 'files',
            'doc' => 'files', 'docx' => 'files', 'txt' => 'files', 'xls' => 'files', 'xlsx' => 'files',
        ];

        return $folders[$fileExtension] ?? 'files';
    }

    public function getForeignKey($model, $foreignKey, $id)
    {
        return $model::where("id", $id)->pluck($foreignKey)->first();
    }

    public function deleteFile($path)
    {
        $fileName = basename($path);
        $folder = $this->findFolder($fileName);
        $imagePath = public_path('assets/' . $folder . '/' . $fileName);

        if (file_exists($imagePath)) {
            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
