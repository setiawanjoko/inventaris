<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangRequest;
use App\Models\Ruang;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('ruang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RuangRequest $request
     * @return RedirectResponse
     */
    public function store(RuangRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            Ruang::create($validated);

            return response()->redirectToRoute('ruang.index');
        } catch (\Exception $e){
            return response()->redirectToRoute('ruang.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $data = Ruang::findOrFail($id);

        return response()->view('ruang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RuangRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RuangRequest $request, int $id): RedirectResponse
    {
        $data = Ruang::findOrFail($id);

        try {
            $data->name = $request->get('name');
            $data->description = $request->get('description');
            $data->save();

            return response()->redirectToRoute('ruang.index');
        }catch (\Exception $e){
            return response()->redirectToRoute('ruang.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $data = Ruang::findOrFail($id);

        if(isset($data->inventaris) && $data->inventaris->count() > 0) abort(500); // TODO: Cannot delete room while it has things inside

        try {
            $data->delete();

            return response()->redirectToRoute('ruang.index');
        } catch (\Exception $e){
            return response()->redirectToRoute('ruang.index');
        }
    }
}
