<?php


use Carbon\Carbon;
use App\Models\Variabel;
use Illuminate\Support\Str;

if (! function_exists('tgl_id')) {
    function tgl_id($tgl)
    {
        $dt = new Carbon($tgl);
        setlocale(LC_TIME, 'IND');
        return $dt->formatLocalized('%d %B %Y');   
    }
}

function clusterGet(){
    $querycount  = DB::table('clust')
				->select('cluster',DB::raw('count(cluster) as countcluster'))
				->groupBy('cluster')
                ->get();    
    return $querycount;
}