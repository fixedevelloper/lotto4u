<?php

namespace App\Console\Commands;

use App\Helper\PaymentApiService;
use App\Models\Payment;
use Illuminate\Console\Command;

class MakeStatus extends Command
{
    protected $paymentApiService;

    /**
     * HomeController constructor.
     * @param $paymentApiService
     */
    public function __construct(PaymentApiService $paymentApiService)
    {
        $this->paymentApiService = $paymentApiService;
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $operations=Payment::query()->where(['status'=>"pending"])->get();
        logger($operations);
        foreach ($operations as $operation) {
            $rest=$this->paymentApiService->getPayID([
                'transactionId'=>$operation->reference,
            ]);
            if (isset($rest['id'])){
                if ($rest['status']=="Success"){
                    if ($operation->status!="success"){
                        $operation->status="success";
                        $operation->save();
                    }
                }
            }
        }

    }
}
