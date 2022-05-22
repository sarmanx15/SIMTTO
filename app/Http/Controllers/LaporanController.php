<?php

namespace App\Http\Controllers;

use App\Models\Laporanpenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use DB;
use App\Models\Pelayanan;

class LaporanController extends Controller
{
    public function indexService()
    {
        $pelayanans = Pelayanan::select([
            \DB::raw("DATE(created_at) as Tanggal"),
            \DB::raw('SUM(biaya) as biaya'),
        ])->groupBy('Tanggal')->get();
        return view('admin.laporan.Mlaporanservice', [
            'tittle' => 'Laporan Pelayanan Service',
            'Pelayanan' => $pelayanans,
        ]);
    }
    public function index()
    {
        $laporans = Laporanpenjualan::all();
        $laporan = Laporanpenjualan::select([
            // 'id_barang',
            \DB::raw("DATE(created_at) as Tanggal"),
            \DB::raw('SUM(total_penjualan) as Total_Jual'),
            \DB::raw('SUM(total_pembelian) as Total_Beli'),
            \DB::raw('SUM(pendapatan) as Pendapatan'),
        ])
            ->groupBy('Tanggal')
            ->get();
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('y')));
        $tanggalAkhir = date('Y-m-d');

        return view(
            'admin.laporan.Mlaporan',
            [
                'tittle' => 'Laporan',
                'tanggalAwal' => $tanggalAwal,
                'tanggalAkhir' => $tanggalAkhir,
                'laporan' => $laporan,
                'laporans' => $laporans,
            ]
        );
    }

    public function getDetail($tanggal)
    {
        //Cek apakah string adalah format tanggal
        if ($this->isDate($tanggal)) {
            $laporan = Laporanpenjualan::select([
                'barangs.name as name',
                'total_penjualan',
                'banyak_penjualan',
                'total_pembelian',
                'banyak_pembelian',
                'status',
                'pendapatan'
            ])
                ->join('barangs', 'laporanpenjualans.id_barang', '=', 'barangs.id_barang')
                ->whereDate("laporanpenjualans.created_at", $tanggal)
                ->get();
            $data = $laporan->map(function ($item, $key) {
                return collect($item)->flatten()->map(function ($item, $key) {
                    return (string)$item;
                });
            });
            // foreach ($laporan as $l) {
            //     $temp = [];
            //     $temp = array_merge($temp, array($l['name']));
            //     $temp = array_merge($temp, array((string)$l['total_penjualan']));
            //     $temp = array_merge($temp, array((string)$l['banyak_penjualan']));
            //     $temp = array_merge($temp, array((string)$l['total_pembelian']));
            //     $temp = array_merge($temp, array((string)$l['banyak_penjualan']));
            //     $temp = array_merge($temp, array((string)$l['pendapatan']));
            //     array_push($data, $temp);
            // }
            return response()->json($data);
        }
    }

    public function isDate($value)
    {
        if (!$value) {
            return false;
        } else {
            $date = date_parse($value);
            if ($date['error_count'] == 0 && $date['warning_count'] == 0) {
                return checkdate($date['month'], $date['day'], $date['year']);
            } else {
                return false;
            }
        }
    }
}
