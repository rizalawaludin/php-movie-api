<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;

class FilmController extends Controller
{
    public function index()
    {
    	return response()->json(film::all(),200);
    }
    public function create(Request $request)
    {	
    	$insert = new film;
    	$insert->title = $request->title;
    	$insert->description = $request->description;
    	$insert->save();

    	return response([
    		'status' => 'OK',
    		'message' => 'Barang Disimpan',
    		'data' => $insert
    	]);
    }
    public function update(Request $request,$id)
    {
    	$check_barang = film::firstWhere('id',$id);
    	if($check_barang){
    		$data = film::find($id);
    		$data->title = $request->title;
    		$data->description = $request->description;
    		$data->save();
    		return response([
	    		'status' => 'OK',
	    		'message' => 'Data Berhasil Diubah',
	    		'data' => $data
	    	],200);
    	}else{
	    	return response([
	    		'status' => 'Not Found',
	    		'message' => 'Kode Barang Tidak Ditemukan',
	    	],404);
    	}
    }
    public function destroy($id)
    {
    	$check_barang = film::firstWhere('id',$id);
	    if($check_barang){
	    	$data = film::find($id);
	    	$data->delete();
	    	return response([
		    	'status' => 'OK',
		    	'message' => 'Data Berhasil Dihapus',
		    ],200);
	    }else{
		    return response([
		    	'status' => 'Not Found',
		    	'message' => 'Kode Barang Tidak Ditemukan',
		    ],404);
	    }
    }
    public function restore($id)
{
    	$data = film::onlyTrashed()->where('id',$id);
    	$data->restore();
    	return response([
		    	'status' => 'OK',
		    	'message' => 'Data Berhasil Dikembalikan',
		    ],200);
}
}
