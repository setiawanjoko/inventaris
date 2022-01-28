<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('jenis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JenisRequest $request
     * @return RedirectResponse
     */
    public function store(JenisRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            Jenis::create($validated);

            return response()->redirectToRoute('jenis.index');
        } catch (Exception $e){
            return response()->redirectToRoute('jenis.create');
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
        $data = Jenis::findOrFail($id);

        return response()->view('jenis.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $data = Jenis::findOrFail($id);

        try {
            $data->name = $request->get('name');
            $data->description = $request->get('description');
            $data->save();

            return response()->redirectToRoute('jenis.index');
        }catch (\Exception $e){
            return response()->redirectToRoute('jenis.edit', $id);
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
        $data = Jenis::findOrFail($id);

        if(isset($data->inventaris) && $data->inventaris->count() > 0) abort(500);

        try {
            $data->delete();

            return response()->redirectToRoute('jenis.index');
        }catch (\Exception $e){
            return response()->redirectToRoute('jenis.index');
        }
    }
}
