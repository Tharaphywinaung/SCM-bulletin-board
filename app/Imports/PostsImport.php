<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class PostsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'     => $row['title'],
            'description'    => $row['description'], 
            'status' => $row['status'],
            'create_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id,
        ]);
    }
}
