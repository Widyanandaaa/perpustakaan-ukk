<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'book_id',
        'created_at',
        'updated_at',
    ];

    public function coverPath()
    {
        $ImagePath  = ($this->cover) ? $this->cover : 'NyZ17qRrxznFsgskWxqW4f2CrShFL6m208GCufZv.png';
        
        return '/storage/image/' . $ImagePath;
    }
}
