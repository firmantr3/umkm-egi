<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use App\Repositories\produkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\kategori;
use App\Repositories\kategoriRepository;
use Intervention\Image\Facades\Image;

class produkController extends AppBaseController
{
    /** @var  produkRepository */
    private $produkRepository;

    /** @var kategoriRepository */
    private $kategoriRepository;

    public function __construct(produkRepository $produkRepo, kategoriRepository $kategoriRepo)
    {
        $this->produkRepository = $produkRepo;
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * Display a listing of the produk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // dd(config('auth.guard'));
        $this->produkRepository->pushCriteria(new RequestCriteria($request));
        $produks = $this->produkRepository->paginate(4);

        return view('produk.index')
            ->with('produks', $produks);
    }

    /**
     * Show the form for creating a new produk.
     *
     * @return Response
     */
    public function create()
    {
        $kategoriOptions = $this->kategoriRepository->selectOptions();

        return view('produk.create')
            ->with(compact('kategoriOptions'));
    }

    /**
     * Store a newly created produk in storage.
     *
     * @param CreateprodukRequest $request
     *
     * @return Response
     */
    public function store(CreateprodukRequest $request)
    {
        $filename = md5("produk-{$request->gambar}") . ".{$request->gambar->extension()}";

        $gambar = Image::make($request->file('gambar'))
            ->fit(200, 200, function($constraint) {
                $constraint->upsize();
            })
            ->save(storage_path('app/public/produk/' . $filename));

        $input = $request->except('gambar');
        $input['gambar'] = $filename;

        $produk = $this->produkRepository->create($input);

        Flash::success('Produk saved successfully.');

        return redirect(route('produk.index'));
    }

    /**
     * Display the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produk.index'));
        }

        return view('produk.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produk.index'));
        }

        $kategoriOptions = $this->kategoriRepository->selectOptions();

        return view('produk.edit')->with(compact('produk', 'kategoriOptions'));
    }

    /**
     * Update the specified produk in storage.
     *
     * @param  int              $id
     * @param UpdateprodukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprodukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produk.index'));
        }

        $input = $request->except('gambar');
        if($request->hasFile('gambar')) {
            $filename = md5("produk-{$request->gambar}") . ".{$request->gambar->extension()}";
            $gambar = Image::make($request->file('gambar'))
                ->fit(200, 200, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(storage_path('app/public/produk/' . $filename));
            $input['gambar'] = $filename;
        }

        $produk = $this->produkRepository->update($input, $id);

        Flash::success('Produk updated successfully.');

        return redirect(route('produk.index'));
    }

    /**
     * Remove the specified produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produk.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk deleted successfully.');

        return redirect(route('produk.index'));
    }
}
