<?php

namespace App\Http\Controllers;

use DB;
use App\Pemesanan;
use App\Inventaris;
use App\Jenis_surat;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $inv = Inventaris::all();
        $jenis = Jenis_surat::all();
        
        return view ('index', compact('inv', 'jenis'));
    }

    public function pinjaminventaris(Request $request)
    {
        $t = time();
        $kode = mt_rand(100000, 999999);
        $tgl = (date("Y-m-d", $t));
        $id_inv = $request->id_inventaris;
        $jml = 1;

        $i = Inventaris::findOrFail($id_inv);
        $stat = DB::table('inventaris')->select('status_barang')->where('id_inventaris', '=', $id_inv)->value('status_barang');
        
        if($stat==1){
            $p = new Pemesanan();
            $p->no_book = $kode;
            $p->id_inventaris = $id_inv;
            $p->nama_pemesan = $request->nama_pemesan;
            $p->nrp_pemesan = $request->nrp_pemesan;
            $p->file_foto = $request->file_foto;
            $p->tanggal_pemesanan = $tgl;
            $p->jumlah_pesan = $jml;
            $p->save();   
        }
        else{
            $kode = "gagal minjam";
        }
        return($kode); 
    }

    public function cekbookinginv(Request $request)
    {
        $kode_book = $request->cek_booking;
        $c = Pemesanan::findOrFail($kode_book);
        $stat = DB::table('pemesanans')->select('status')->where('no_book', '=', $kode_book)->value('status');
        if($stat==1){
            $status_pinjam = "true"; //kalo disetuji
        }
        else{
            $status_pinjam = "false"; //kalo ga disetujui, masih 0
        }

        return($status_pinjam);
    }

    public function listinv()
    {
        $pinjam_inv = DB::table('pemesanans')->join('inventaris', 'pemesanans.id_inventaris', '=', 'inventaris.id_inventaris')
                                            ->where([
                                                ['pemesanans.id_inventaris', '<>', NULL],
                                                ['status', '=', 0]])->get();
        $kembali_inv = DB::table('pemesanans')->join('inventaris', 'pemesanans.id_inventaris', '=', 'inventaris.id_inventaris')
                                            ->where([
                                                ['pemesanans.id_inventaris', '<>', NULL],
                                                ['status', '=', 1],
                                                ['inventaris.status_barang', '=', 0]])->get();
        return view('list', compact('pinjam_inv', 'kembali_inv'));
    }

    public function pinjaminv($no_book)
    {
        $k = Pemesanan::findOrFail($no_book);
        $id_pinjam = DB::table('pemesanans')->select('id_inventaris')->where('no_book', '=', $no_book)->value('id_inventaris');

        $updStatus = DB::table('pemesanans')->where('no_book', '=', $no_book)->update(['status' => 1]);
        $updStatusBrg = DB::table('inventaris')->where('id_inventaris', '=', $id_pinjam)->update(['status_barang' => 0]);

        return redirect('/list');
    }

    public function kembaliinv($no_book)
    {
        $k = Pemesanan::findOrFail($no_book);
        $id_pinjam = DB::table('pemesanans')->select('id_inventaris')->where('no_book', '=', $no_book)->value('id_inventaris');

        $updStatusBrg = DB::table('inventaris')->where('id_inventaris', '=', $id_pinjam)->update(['status_barang' => 1]);

        return redirect ('/list');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemesanan $pemesanan)
    {
        //
    }
}
