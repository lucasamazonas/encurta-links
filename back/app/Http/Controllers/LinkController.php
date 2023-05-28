<?php

namespace App\Http\Controllers;

use App\Http\Contracts\CrudLinkContract;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller implements CrudLinkContract
{
    public function index(): JsonResponse
    {
        $links = Link::query()
            ->from('links AS l')
            ->selectRaw('*, (SELECT count(c.id)  FROM clicks AS c WHERE c.id_link = l.id) AS clicks')
            ->orderBy('created_at')
            ->get();

        foreach ($links as $link) {
            $link->alias = config('app.url') . '/' . $link->id;
        }

        return response()->json($links, Response::HTTP_OK);
    }

    public function store(StoreLinkRequest $request): JsonResponse
    {
        $id = trim($request->id);

        if (is_null($request->id)) {
            $id = $this->generateRandomId();
        }

        $newLink = new Link();
        $newLink->id = $id;
        $newLink->name = $request->name;
        $newLink->url = $request->url;
        $newLink->save();

        return response()->json(Link::find($id), Response::HTTP_CREATED);
    }

    private function generateRandomId(): string
    {
        $ramdom = str_shuffle(Str::random(rand(2, 4)) . rand(0, 9999));

        if (!is_null(Link::find($ramdom))) {
            return $this->generateRandomId();
        }

        return $ramdom;
    }

    public function update(Link $link, UpdateLinkRequest $request): JsonResponse
    {
        $link->url = $request->url;
        $link->name = $request->name;
        $link->save();

        return response()->json($link->refresh(), Response::HTTP_OK);
    }

    public function destroy(Link $link): JsonResponse
    {
        DB::transaction(function () use ($link) {
            Click::where('id_link', $link->id)->delete();
            $link->delete();
        });

        return response()->json(null, Response::HTTP_OK);
    }

    public function deleteAll(): JsonResponse
    {
        DB::transaction(function () {
            Click::getQuery()->delete();
            Link::getQuery()->delete();
        });

        return response()->json(null, Response::HTTP_OK);
    }
}
