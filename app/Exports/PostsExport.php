<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PostsExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
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

    // Select data from query and set its position
    public function map($post): array
    {
        return [
            $post->id,
            $post->title,
            $post->description,
            $post->status,
            $post->create_user_id,
            $post->updated_user_id,
            $post->created_at,
            $post->updated_at,
        ];
    }

    // Set Date Format
    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}