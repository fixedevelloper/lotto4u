<?php


namespace App\Helper;


use App\Models\Contact;
use App\Models\RegisterOnline;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscriptionExport implements FromCollection
{

    public function collection()
    {
        return RegisterOnline::query()->leftJoin('contacts','contacts.id','=','contact_id')->orderByDesc('register_onlines.id')->get();
    }
}
