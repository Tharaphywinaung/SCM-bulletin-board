<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Auth;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.title' => 'required|unique:posts',
            '*.description' => 'required',
            '*.status' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            Post::create([
            'title'     => $row['title'],
            'description'    => $row['description'], 
            'status' => $row['status'],
            'create_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id,
            ]);
        }
    }
}