<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\produk;

class KeranjangService {
    protected $items;

    protected $sessionKey = 'keranjang';

    public function __construct()
    {
        $this->items = session($this->sessionKey, []);
    }

    public function add($productId, $qty = 1) {
        if(isset($this->items[$productId])) {
            $this->items[$productId]['qty'] += $qty;
        }
        else {
            $this->items[$productId] = [
                'id' => $productId,
                'qty' => $qty,
            ];
        }

        $this->save();

        return $this;
    }

    public function increment($productId, $qty = 1) {
        return $this->add($productId, $qty);
    }

    public function decrement($productId, $qty = 1)
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['qty'] -= $qty;

            if($this->items[$productId]['qty'] == 0) {
                $this->del($productId);
            }
            else {
                $this->save();
            }
        }

        return $this;
    }

    public function del($productId) {
        if (isset($this->items[$productId])) {
            $this->items = collect($this->items)->forget($productId)
                ->toArray();
        }

        $this->save();

        return $this;
    }

    public function empty() {
        session()->forget([$this->sessionKey]);

        return $this;
    }

    public function save() {
        session([
            $this->sessionKey => $this->items,
        ]);

        return $this;
    }

    public function all() {
        $this->mapProducts();

        return collect($this->items);
    }

    public function mapProducts() {
        $unloadedProductIds = collect($this->items)->filter(function($item) {
                return !isset($item['product']);
            })
            ->pluck('id');

        if($unloadedProductIds->count()) {
            $products = produk::whereIn('id', $unloadedProductIds)->get()->keyBy('id');
    
            foreach ($this->items as $key => $item) {
                if(isset($products[$item['id']])) {
                    $this->items[$item['id']]['product'] = $products[$item['id']];
                }
            }
        }

        return $this;
    }

    public function itemCount() {
        return $this->all()->sum('qty');
    }

    public function totalCount() {
        return $this->all()
            ->map(function($item) {
                return $item['qty'] * $item['product']->harga;
            })
            ->sum();
    }
}
