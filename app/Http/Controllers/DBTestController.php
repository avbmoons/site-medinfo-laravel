<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Documents\Receipt;
use App\Models\VideoCall;
use Illuminate\Support\Facades\DB;

class DBTestController extends Controller
{
    public function __invoke(): string
    {
        try {
            DB::connection()->getPdo();
            \dump(VideoCall::all()[0]->meeting);
            return 'you are connected to database';
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
