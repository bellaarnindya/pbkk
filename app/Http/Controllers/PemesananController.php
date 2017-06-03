<?php

namespace App\Http\Controllers;

use DB;
use App\Pemesanan;
use App\Inventaris;
use App\Jenis_surat;
use App\Surat;
use App\Rekap_surat;

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

    //DARI RANI
    public function pinjaminventaris(Request $request)
    {
        $t = time();
        $kode = mt_rand(100000, 999999);
        
        
        $tgl = $request->inputInven['tanggal_pinjam'];
        $tanggal = substr($tgl, 0, 10);
        $id_inv = $request->inputInven['id_inventaris'];
    
    
        $jml = 1;

        $i = Inventaris::findOrFail($id_inv);
        $stat = DB::table('inventaris')->select('status_barang')->where('id_inventaris', '=', $id_inv)->value('status_barang');
        
        if($stat==1){
            $p = new Pemesanan();
            $p->no_book = $kode;
            $p->id_inventaris = $id_inv;
            
            $p->nama_pemesan = $request->inputInven['nama_pemesan'];
            $p->nrp_pemesan = $request->inputInven['nrp_pemesan'];
            $p->file_foto = $request->inputInven['file_foto'];
            $p->tanggal_pemesanan = $tanggal;
    
    
            $p->jumlah_pesan = $jml;
            $p->save();
        }
        else{
            $kode = "!!ERROR";
        }
        return $kode; 
    }

    public function cekbookinginv(Request $request)
    {
        //$kode_book = $request->cek_booking;
        $kode_book = $request->inputBookingInven;
        $c = Pemesanan::findOrFail($kode_book);
        $stat = DB::table('pemesanans')->select('status')->where('no_book', '=', $kode_book)->value('status');
        if($stat==1){
            $status_pinjam = 1; //kalo disetuji
        }
        else{
            $status_pinjam = 0; //kalo ga disetujui, masih 0
        }

        return $status_pinjam;
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
        
        
        

        $data = array(
            'pinjam_inv' => $pinjam_inv,
            'kembali_inv' => $kembali_inv
        );
        
        $data = json_encode($data);
        return $data;
    
    
    }

    public function pinjaminv($no_book)
    {
        $k = Pemesanan::findOrFail($no_book);
        $id_pinjam = DB::table('pemesanans')->select('id_inventaris')->where('no_book', '=', $no_book)->value('id_inventaris');

        $updStatus = DB::table('pemesanans')->where('no_book', '=', $no_book)->update(['status' => 1]);
        $updStatusBrg = DB::table('inventaris')->where('id_inventaris', '=', $id_pinjam)->update(['status_barang' => 0]);

    }

    public function kembaliinv($no_book)
    {
        $k = Pemesanan::findOrFail($no_book);
        $id_pinjam = DB::table('pemesanans')->select('id_inventaris')->where('no_book', '=', $no_book)->value('id_inventaris');

        $updStatusBrg = DB::table('inventaris')->where('id_inventaris', '=', $id_pinjam)->update(['status_barang' => 1]);

    }

    //DARI UPIK
    public function pesansurat(Request $request)
    {


        $t = time();
        $tgl = date("Y-m-d", $t);
        $no_book = mt_rand(100000, 999999);

        $id = DB::table('surats')->max('id_surat');

        $max_id_increment = substr($id, 3, 5);
        $max_id_increment += 1;
        if (strlen($max_id_increment) == 1)
        {
            $max_id_increment = "00" . $max_id_increment;
        }
        else if (strlen($max_id_increment) == 2)
        {
            $max_id_increment = "0" . $max_id_increment;
        }
        $id_surat = "SR".$max_id_increment;
        $id_jenis = $request->input['id_jenis'];

        $s = new Surat();
            $s->id_surat = $id_surat;
            $s->id_jenis = $request->input['id_jenis'];
            $s->nama_pemohon = $request->input['nama_pemohon'];
            $s->nrp_pemohon = $request->input['nrp_pemohon'];
            $s->tanggal_waktu_mulai = $request->input['waktu_mulai'];
            $s->tanggal_waktu_selesai = $request->input['waktu_selesai'];
            $s->kegiatan = $request->input['kegiatan'];
            $s->tanggal_waktu_pelaksanaan = $request->input['tanggal_pelaksanaan'];
            $s->tempat_pelaksanaan = $request->input['tempat_pelaksanaan'];
            $s->tempat_pinjam = $request->input['tempat_pinjam'];
            $s->tujuan = $request->input['tujuan'];
            $s->nama_ketupel = $request->input['nama_ketupel'];
            $s->nrp_ketupel = $request->input['nrp_ketupel'];
            $s->angkatan_c = $request->input['angkatan_c'];
            $s->jabatan = $request->input['jabatan'];
            if ($id_jenis=='JS001' || $id_jenis=='JS002') $s->perihal = 'Surat Keterangan';
            else if ($id_jenis=='JS003') $s->perihal='Permohonan Izin Keramaian';
            else if ($id_jenis=='JS004') $s->perihal='Permohonan Izin Peminjaman Alat Musik';
            else if ($id_jenis=='JS005') $s->perihal='Permohonan Izin Peminjaman Ruang';
            else if ($id_jenis=='JS006') $s->perihal='Permohonan Izin Peminjaman Tempat';

            $s->save();

        $p = new Pemesanan();
            $p->no_book = $no_book;
            $p->id_surat = $id_surat;
            $p->nama_pemesan = $request->input['nama_pemohon'];
            $p->nrp_pemesan = $request->input['nrp_pemohon'];
            $p->tanggal_pemesanan = $tgl;
            $p->save();

        return $no_book;
    }

    public function ceksurat(Request $request)
    {
        $row = pemesanan::find($request->inputBookingSurat);
        $stat = DB::table('pemesanans')->select('status')->where('no_book', '=', $request->inputBookingSurat)->value('status');
        if($stat==1){
            return 1; //kalo setuju
        }
        else{
            return 0; //kalo ga setuju
        }
    }

    public function listsurat()
    {
        $pinjam_srt = DB::table('pemesanans')->join('surats', 'pemesanans.id_surat', '=', 'surats.id_surat')
                                            ->where([['pemesanans.id_surat', '<>', NULL],
                                                ['status', '=', 0]])->get();
        
//        $pinjam_srt = json_encode($pinjam_srt);
//        return $pinjam_srt;
        //dd($pinjam_srt);
        $pinjam_srt = json_encode($pinjam_srt);
        return $pinjam_srt;
    }

    public function acc($no_book)
    {
        $surat = Pemesanan::findOrFail($no_book)->get();
//        dd($surat);
        DB::table('pemesanans')
            ->where('no_book', '=', $no_book)
            ->update(['status' => 1]);
        $id_srt = DB::table('pemesanans')->select('id_surat')->where('no_book', '=', $no_book)->value('id_surat');
        $id_jns = DB::table('surats')->select('id_jenis')->where('id_surat', '=', $id_srt)->value('id_jenis');
        $tipe = DB::table('jenis_surats')->select('tipe')->where('id_jenis', '=', $id_jns)->value('tipe');

        $id = DB::table('rekap_surats')->max('id_rekap');
        $max_id_increment = substr($id, 3, 5);
        $max_id_increment += 1;
        if (strlen($max_id_increment) == 1)
        {
            $max_id_increment = "00" . $max_id_increment;
        }   
        else if (strlen($max_id_increment) == 2)
        {
            $max_id_increment = "0" . $max_id_increment;
        }
        $id_rekap = "RK".$max_id_increment;

        //get tanggal
        $t = time();
        $tanggal = date("Y-m-d", $t);
        $bulan = substr($tanggal, 5, 2);
        $tahun = substr($tanggal, 0, 4);

        if($bulan=='01') $bln="I";
        elseif ($bulan=='02') $bln="II";
        elseif ($bulan=='03') $bln="III";
        elseif ($bulan=='04') $bln="IV";
        elseif ($bulan=='05') $bln="V";
        elseif ($bulan=='06') $bln="VI";
        elseif ($bulan=='07') $bln="VII";
        elseif ($bulan=='08') $bln="VIII";
        elseif ($bulan=='09') $bln="IX";
        elseif ($bulan=='10') $bln="X";
        elseif ($bulan=='11') $bln="XI";
        elseif ($bulan=='12') $bln="XII";
//      BELOM BISAAAAAA!!!!!!!
//        $suratB = DB::table('rekap_surats')
//            ->join('surats', 'rekap_surats.id_surat', '=', 'surats.id_surat')
//            ->join('jenis_surats', 'jenis_surats.id_jenis', '=', 'surats.id_jenis')
//                ->select('rekap_surats.nomor_surat')
//            ->where('jenis_surats.id_jenis','=',"JS006")->get();
//
//            $suratA = DB::table('rekap_surats')
//                ->join('surats', 'rekap_surats.id_surat', '=', 'surats.id_surat')
//                ->join('jenis_surats', 'jenis_surats.id_jenis', '=', 'surats.id_jenis')
//                ->select('rekap_surats.nomor_surat')
//                ->where('jenis_surats.id_jenis','<>',"JS006")->get();
//
//        if ($tipe=='A') {
//
//                $nomor_surat = $suratA->max('nomor_surat');
///           echo $nomor_surat;
//
//        }
//        else if ($tipe=='B') {
//            $nomor_surat = $suratB->max('nomor_surat');
//        }


        $nomor_surat = DB::table('rekap_surats')->max('nomor_surat');

        $nomor = explode("/", $nomor_surat);

        (int)$nomor[0] += 1;
        $nosurat = $nomor[0]."/".$tipe."/HMTC/".$bln."/".$tahun;

        $rekap = new Rekap_surat();
            $rekap->id_rekap = $id_rekap;
            $rekap->id_surat = $id_srt;
            $rekap->nomor_surat = $nosurat;
            $rekap->save();

//        $rk = new Rekap_surat();
//            $rk->id_rekap = $id_rekap;
//            $rk->id_surat = $id_srt;
//            $rk->nomor_surat = $nosurat;
//            $rk->save();

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
