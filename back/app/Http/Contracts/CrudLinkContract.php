<?php

namespace App\Http\Contracts;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;

interface CrudLinkContract {
    public function index(): JsonResponse;

    public function store(StoreLinkRequest $request): JsonResponse;

    public function update(Link $link, UpdateLinkRequest $request): JsonResponse;

    public function destroy(Link $link): JsonResponse;
}
