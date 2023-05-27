<?php

namespace App\Http\Controllers;

use App\Http\Contracts\CrudLinkContract;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LinkControllerContract extends Controller implements CrudLinkContract
{
    public function index(): JsonResponse
    {
        $links = Link::query()
            ->orderBy('created_at')
            ->get()
            ->toArray();

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
        $link->save();

        return response()->json($link->refresh(), Response::HTTP_OK);
    }

    public function destroy(Link $link): JsonResponse
    {
        $link->delete();

        return response()->json(null, Response::HTTP_OK);
    }
}
