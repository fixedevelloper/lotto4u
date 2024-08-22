<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayingFixture extends Model
{
    use HasFactory;
    public function lotto_fixture_item() {
        return $this->belongsTo(LottoFixtureItem::class, 'loto_fixture_item_id', 'id');
    }
}
