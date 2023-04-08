<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $token = Token::where('token', $request->input('token'))->first();
        if ($token){
            $user = User::findOrFail($token->userId);
            if ($user && $user->act == null){
                return response()->json([
                    'status' => false,
                    'message' => 'The account has not been verified',
                ], 403);
            }

            $provider = Provider::where('userId', $user->id)->first();

            // your Code -----------------------

            $results = DB::select("
                SELECT users.firstName,users.lastName,positions.lang,positions.lat, services.*,service_user.orderId,service_user.color,service_user.price
                FROM services
                INNER JOIN service_user ON service_user.serviceId = services.id
                INNER JOIN users ON service_user.userId = users.id
                LEFT JOIN positions ON positions.userId = service_user.userId
                WHERE services.city_id = ?
                AND services.type = ?
            ", [$request->cityId, $provider->service_type]);


            // -----------------------


//            $servicesUser =  ServiceUser::where('userId', $user->id)
//                ->where('status', 1)
//                ->get();
//            $position = Position::where('userId', $user->id)->get();
//            $services = Service::where('type', $request->serviceType)
//                ->where('city_id', $request->cityId)
//                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Make offer successful',
                'data' => $results
            ], 200);

            // End your Code

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }
}
