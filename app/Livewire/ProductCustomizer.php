<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemOption;

class ProductCustomizer extends Component
{
    public $product;
    public $allAttributes;
    public $selectedOptions = [];
    public $totalPrice      = 0;
    public $basePrice       = 0;
    public string $shirtHexColor = '#f8fafc';

    // Customer
    public $customer_name;
    public $customer_phone;
    public $customer_address;

    // Success state
    public bool $orderSuccess = false;
    public int  $orderId      = 0;

    public function mount($id = null): void
    {
        $this->product = $id ? Product::find($id) : Product::first();

        if ($this->product) {
            $this->basePrice    = $this->product->base_price;
            $this->totalPrice   = $this->basePrice;
            $this->allAttributes = Attribute::with('options')->get();

            foreach ($this->allAttributes as $attribute) {
                $first = $attribute->options->first();
                $this->selectedOptions[$attribute->id] = $first ? $first->id : '';
            }

            $this->calculatePrice();
        }
    }

    // Called by chip buttons via wire:click
    public function selectOption($attributeId, $optionId): void
    {
        $this->selectedOptions[$attributeId] = $optionId;
        $this->calculatePrice();
    }

    public function calculatePrice(): void
    {
        $extraPrice = 0;
        foreach ($this->selectedOptions as $optionId) {
            if ($optionId) {
                $option = AttributeOption::find($optionId);
                if ($option) {
                    $extraPrice += $option->price_modifier;
                }
            }
        }
        $this->totalPrice = $this->basePrice + $extraPrice;
        $this->syncShirtColor();
    }

    private function syncShirtColor(): void
    {
        $colorMap = [
            'White' => '#f8fafc',
            'Blue'  => '#3b82f6',
            'Pink'  => '#fbcfe8',
            'Black' => '#1e293b',
        ];

        foreach ($this->allAttributes ?? [] as $attribute) {
            if (strtolower($attribute->name) === 'color') {
                $optionId = $this->selectedOptions[$attribute->id] ?? null;
                if ($optionId) {
                    $option = $attribute->options->firstWhere('id', $optionId);
                    if ($option && isset($colorMap[$option->value])) {
                        $this->shirtHexColor = $colorMap[$option->value];
                        return;
                    }
                }
                break;
            }
        }

        $this->shirtHexColor = '#f8fafc';
    }

    public function updatedSelectedOptions(): void
    {
        $this->calculatePrice();
    }

    public function submitOrder(): void
    {
        $this->validate([
            'customer_name'    => 'required',
            'customer_phone'   => 'required',
            'customer_address' => 'required',
        ]);

        foreach ($this->allAttributes as $attribute) {
            if (empty($this->selectedOptions[$attribute->id])) {
                session()->flash('error', 'Please select a ' . $attribute->name);
                return;
            }
        }

        $order = Order::create([
            'customer_name'    => $this->customer_name,
            'customer_phone'   => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'total_amount'     => $this->totalPrice,
            'status'           => 'pending',
        ]);

        $orderItem = OrderItem::create([
            'order_id'   => $order->id,
            'product_id' => $this->product->id,
            'quantity'   => 1,
            'unit_price' => $this->totalPrice,
        ]);

        foreach ($this->selectedOptions as $attributeId => $optionId) {
            $attribute = Attribute::find($attributeId);
            $option    = AttributeOption::find($optionId);

            OrderItemOption::create([
                'order_item_id'       => $orderItem->id,
                'attribute_option_id' => $option->id,
                'attribute_name'      => $attribute->name,
                'option_value'        => $option->value,
                'price_modifier'      => $option->price_modifier,
            ]);
        }

        $this->orderId      = $order->id;
        $this->orderSuccess = true;
        $this->reset(['customer_name', 'customer_phone', 'customer_address', 'selectedOptions']);
        $this->totalPrice = $this->basePrice;
    }

    public function render()
    {
        return view('livewire.product-customizer');
    }
}