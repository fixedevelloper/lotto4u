<?php


namespace App\Helper;


use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{

    public function collection()
    {
        return Contact::query()->orderByDesc('id')->get();
    }
}
