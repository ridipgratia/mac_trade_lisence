<?php

namespace App\View\Components\trade;

use Illuminate\View\Component;

class TradeDetailsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tradeDetailsExtra;
    public function __construct($tradeDetailsExtra)
    {
        $this->tradeDetailsExtra = $tradeDetailsExtra;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trade.trade-details-component');
    }
}
