<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection,WithHeadings
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'description',
            'status',
            'create_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
        // return collect(Post::getPost());
    }
}