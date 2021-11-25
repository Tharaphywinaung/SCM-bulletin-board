<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Post;

class ExcelCSVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.csv_upload');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([
           'file' => 'required',
        ]);
        Excel::import(new PostsImport,$request->file('file'));
        return redirect()->route('posts.index')->with('status', 'The file has been excel/csv imported to database.');
    }
 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV(Request $request, $slug) 
    {
        return Excel::download(new PostsExport($request->id), 'posts.'.$slug);
    }
}
