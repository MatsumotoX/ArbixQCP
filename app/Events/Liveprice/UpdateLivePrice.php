<?php

namespace App\Events\Liveprice;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

use App\Orderbook\Binance\BinanceOrderbook;

class UpdateLivePrice implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $orderbooks;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($json)
    {
        $this->orderbooks = $json;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('liveprices');
    }

    public function broadcastWith()
    {
      return [
        'body' => $this->orderbooks
      ];
    }

    public function broadcastAs() {
        return 'priceupdate';
    }
}
