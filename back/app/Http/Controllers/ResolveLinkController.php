<?php

namespace App\Http\Controllers;

use App\Http\Contracts\CrudLinkContract;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Click;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResolveLinkController extends Controller
{
    public function resolve(Link $link, Request $request)
    {
        $click = new Click();
        $click->id_link = $link->id;
        $click->ip = $request->ip();
        $click->user_agente = $request->header('User-Agent');
        $click->created_at = Carbon::now();
        $click->save();

        return redirect($link->url);
    }
}
