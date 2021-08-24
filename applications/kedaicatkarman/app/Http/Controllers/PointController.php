<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Point;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('point', ['title' => 'Point']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_member' => 'required'
        ]);

        $id_member = $request->input('id_member');       

        if (DB::table('penjualan_pelanggan')->where([['ID', $id_member], ['IS_MEMBER_CARD', 1]])->doesntExist())
        {
            return redirect('/point')->with('status_not_exists', 'id ' . $id_member . ' tidak ditemukan !');
        }
        
        $customer = DB::select("
SELECT
    penjualan_pelanggan.ID 'id',
    penjualan_pelanggan.NAMA 'nama',
    REPLACE(penjualan_pelanggan_alamat.ALAMAT, '|', ', ') 'alamat',
    penjualan_pelanggan.CONTACT 'contact',
    IFNULL((
SELECT
    SUM(IF(penjualan_point_pembuktian.JENIS_TRX = 1, penjualan_point_pembuktian.JUMLAH, 0)) - SUM(IF(penjualan_point_pembuktian.JENIS_TRX = 0, penjualan_point_pembuktian.JUMLAH, 0)) AS 'SISA'	
FROM penjualan_point_pembuktian
WHERE penjualan_point_pembuktian.FOREIGN_PENJUALAN_PELANGGAN_RECNO = penjualan_pelanggan.RECNO
), 0) 'sisa_point'
FROM penjualan_pelanggan
LEFT JOIN penjualan_pelanggan_tgllahir ON penjualan_pelanggan_tgllahir.PELANGGAN_RECNO = penjualan_pelanggan.RECNO
LEFT JOIN penjualan_pelanggan_alamat ON penjualan_pelanggan_alamat.PELANGGAN_RECNO = penjualan_pelanggan.RECNO
WHERE penjualan_pelanggan.DRAFT = 0 AND penjualan_pelanggan.IS_MEMBER_CARD = 1 AND penjualan_pelanggan.ID = ?
LIMIT 1
        ", [$id_member]);

        $title = 'Point';
        $customer = $customer[0];
        return view('point', compact('title', 'customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
