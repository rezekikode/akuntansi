<?php

namespace App\Http\Middleware;

use App\Models\Jurnal;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JurnalBelumPosting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {        
        if ($request->route()->hasParameter('jurnal')) {
            $jurnalId = $request->route('jurnal')->id;
        } else if ($request->route()->hasParameter('id')) {
            $jurnalId = $request->route('id');
        } else {
            $jurnalId = 0;
        }

        $jurnal = Jurnal::findOrFail($jurnalId);

        if ($jurnal->status == Jurnal::STATUS_BELUM_POSTING) {
            return $next($request);            
        }

        return redirect()->route('jurnal.index')->with('error', 'Status Jurnal sudah diposting tidak bisa di ubah.');
    }
}
