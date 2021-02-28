<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\OpenFire;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Firebase\Auth\Token\Exception\InvalidToken;

class UserController extends Controller
{
    public function user(Request $request){
      try{
        // $user_details = OpenFire::getUser($request->username);
        // echo "<pre>";
        // print_r($user_details->getStatusCode());
        // print_r($user_details->getBody());
        // print_r(json_decode($user_details->getBody()->getContents())->username);
        // print_r(get_class_methods($user_details->getBody()->getContents()));


        // $firebase = Firebase::auth();
        $idTokenString = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjBlYmMyZmI5N2QyNWE1MmQ5MjJhOGRkNTRiZmQ4MzhhOTk4MjE2MmIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZ3VkZG9uLWNlNDA2IiwiYXVkIjoiZ3VkZG9uLWNlNDA2IiwiYXV0aF90aW1lIjoxNjE0NDk4MDQwLCJ1c2VyX2lkIjoiZGQ3OW9aQUh4QWJsTE90Ujd6YUJEeVNxZWZoMiIsInN1YiI6ImRkNzlvWkFIeEFibExPdFI3emFCRHlTcWVmaDIiLCJpYXQiOjE2MTQ1MDIwOTAsImV4cCI6MTYxNDUwNTY5MCwicGhvbmVfbnVtYmVyIjoiKzkxODQyMDMzNjg4NiIsImZpcmViYXNlIjp7ImlkZW50aXRpZXMiOnsicGhvbmUiOlsiKzkxODQyMDMzNjg4NiJdfSwic2lnbl9pbl9wcm92aWRlciI6InBob25lIn19.q-DJGhyg7ecMqGoz23dGdVRU5qwlMBPDkInU-JAG_uz5ISLMUaRahzhHHLyeaZJp8JMKNqpGkFboNAw9Dgf-uKmcAebbBho4EQWZ-KSqHcn_F3BCeJy881ar2ucah8BYuqrtIKNwo1uN3snee1BjjQPB64VFHZNlA4hCFoNEC5fRqQ5NgGqNXOG-nq5wFuSSlbf_FK7IbdttUzGKrSN8lpHlh_UjEMs5pEWZ3fxjpzX2iRO-v_2q1pa33mDNgbLteEVhjnWoweeoyLvuHJpIfjlfnSov17k2fLOrgPUQapqisG7fHAGThq5qJIHS_bd_b0xALjrEBd6clshJ1ubRoB';
        // $verifiedIdToken = $firebase->getAuth()->verifyIdToken($idTokenString);
        // echo "Working correct";
        // print_r($firebase);

        // $serviceAccount = ServiceAccount::withServiceAccount(__DIR__.'FirebaseKey.json');
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $auth = $factory->createAuth();
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        echo '-----------';
        print_r(get_class_methods($verifiedIdToken));
        echo '-----------';
        print_r($verifiedIdToken);
        echo "Hello";


      }catch(\Exception $e){
        return error_json($e->getMessage());
      }
    }

    public function create(Request $request){
      try{

      }catch(\Exception $e){

      }
    }
}
