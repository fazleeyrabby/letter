<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pdf_file;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminpdfController extends Controller
{
    public function pdf()
    {
        return view('admin.pdf.pdf');
    }

    public function pdf_save(Request $request)
    {
        $pdf = new pdf_file();
        if ($request->hasFile('pdf_file')){
            $image=$request->file('pdf_file');
            $name=uniqid().$image->getClientOriginalName();
            $uploadPath='assets/dashboard/pdf/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
            $pdf->pdf_file = $imageUrl;
        }

        $pdf->pdf_name = $request->pdf_name;
        $pdf->member = $request->member;
        $pdf->save();

        return back()->with('success','Pdf File Uploaded');
    }

    public function pdf_get()
    {

        $pdf = pdf_file::all();
        return DataTables::of($pdf)
            ->addColumn('action', function ($pdf) {
                return ' <button id="' . $pdf->id . '" onclick="editpdf(this.id)" class="btn btn-primary btn-info btn-sm" data-toggle="modal" data-target="#editpdf"><i class="far fa-edit"></i> </button>
                        <button id="' . $pdf->id . '" onclick="deletepdf(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletepdf"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function pdf_single(Request $request)
    {
        $pdf_single = pdf_file::where('id',$request->id)->first();
        return response($pdf_single);
    }

    public function pdf_update(Request $request)
    {
        $pdf_up = pdf_file::where('id',$request->pdf_edit)->first();
        if ($request->hasFile('pdf_file')){
            @unlink($pdf_up->pdf_file);
            $image=$request->file('pdf_file');
            $name=uniqid().$image->getClientOriginalName();
            $uploadPath='assets/dashboard/pdf/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
            $pdf_up->pdf_file = $imageUrl;
        }

        $pdf_up->pdf_name = $request->pdf_name;
        $pdf_up->member = $request->member;
        $pdf_up->save();

        return back()->with('success','Pdf File Updated');
    }

    public function pdf_delete(Request $request)
    {
        $pdf_del = pdf_file::where('id',$request->pdf_delete)->first();
        @unlink($pdf_del->pdf_file);
        $pdf_del->delete();
        return back()->with('success','Pdf File Deleted');
    }
}
