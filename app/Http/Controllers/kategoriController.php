<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use App\Repositories\kategoriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class kategoriController extends AppBaseController
{
    /** @var  kategoriRepository */
    private $kategoriRepository;

    public function __construct(kategoriRepository $kategoriRepo)
    {
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * Display a listing of the kategori.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kategoriRepository->pushCriteria(new RequestCriteria($request));
        $kategoris = $this->kategoriRepository->all();

        return view('kategori.index')
            ->with('kategoris', $kategoris);
    }

    /**
     * Show the form for creating a new kategori.
     *
     * @return Response
     */
    public function create()
    {
        $indukKategoriOptions = $this->kategoriRepository->indukSelectOptions();

        return view('kategori.create', compact('indukKategoriOptions'));
    }

    /**
     * Store a newly created kategori in storage.
     *
     * @param CreatekategoriRequest $request
     *
     * @return Response
     */
    public function store(CreatekategoriRequest $request)
    {
        $input = $request->all();

        $kategori = $this->kategoriRepository->create($input);

        Flash::success('Kategori saved successfully.');

        return redirect(route('kategori.index'));
    }

    /**
     * Display the specified kategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategori.index'));
        }

        return view('kategori.show')->with('kategori', $kategori);
    }

    /**
     * Show the form for editing the specified kategori.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        $indukKategoriOptions = $this->kategoriRepository->indukSelectOptions($kategori->id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategori.index'));
        }

        return view('kategori.edit')->with(compact('kategori', 'indukKategoriOptions'));
    }

    /**
     * Update the specified kategori in storage.
     *
     * @param  int              $id
     * @param UpdatekategoriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekategoriRequest $request)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategori.index'));
        }

        $kategori = $this->kategoriRepository->update($request->all(), $id);

        Flash::success('Kategori updated successfully.');

        return redirect(route('kategori.index'));
    }

    /**
     * Remove the specified kategori from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategori = $this->kategoriRepository->findWithoutFail($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategori.index'));
        }

        $this->kategoriRepository->delete($id);

        Flash::success('Kategori deleted successfully.');

        return redirect(route('kategori.index'));
    }
}
