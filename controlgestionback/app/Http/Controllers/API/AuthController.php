<?php 
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use OTPHP\TOTP;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetPasswords;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $credentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ];
            $user = User::where('username', $credentials['username'])->first();

            

            if (Auth::attempt($credentials)){
                if($user->has_two_fa && !empty($user->secret) && $request->input('totp') == ''){
                    return response()->json( [
                        'showTOTP' => true,
                    ], 200 );
                }

                if($user->has_two_fa && !empty($user->secret) && $request->has('totp')){
                    $code = $request->input('totp');
                    if(!static::verifyTOTP($user->secret,$code)){
                        return response()->json( [
                            'showTOTP' => true,
                            'errorCode' => true,
                        ], 200 );
                    }
                }
                
                auth()->loginUsingId( User::where( 'username',  $credentials['username'] )->first()->id );
                $user = auth()->user();
                $token = $user->createToken( 'grp_session' )->accessToken;
                // User won´t log because it needs two FA yet
                if ($user->has_two_fa && (!isset($user->secret) || empty($user->secret))) {
                    $label = config('app.name') . "-" . $user->username;
                    $otpSecret = static::getTOTPSecret();
                    $user->secret = $otpSecret;
                    $user->save();
                    $otpUri = static::generateTOTPUri($otpSecret,$label,$token);
                    $qrCode = base64_encode(QrCode::format('png')->size(400)->generate($otpUri));
                    return response()->json( [
                        'authenticated' => false,
                        'setTwoFA'      => true,
                        'qrCode'        => $qrCode,
                        'usr'           => Crypt::encryptString($user->id),
                    ], 200 );
                }

                if ($token) {
                    return response()->json( [
                        'authenticated'             => true,
                        'has_two_fa'                => $user->has_two_fa,
                        'grp_token'                 => $token,
                        'grp_hash'                  => $user->hash,
                        'user'                      => static::getSessionInfo( $user->id ),
                        'grp_token_expiration'      => date( 'D M d Y H:i:s', strtotime( "+1 minutes" ) ),
                    ], 200 );
                }
            }
            return response()->json( [
                'authenticated' => false,
            ], 2000 );
        }
        catch ( \Exception $e ) {
            return response()->json( [
                'success' => false,
                'message' => $e->getMessage()
            ] );
        }
    }

    public function logout()
    {
        $authenticated = true;
        Auth::logout();
        if ( !Auth::check() ) {
            $authenticated = false;
        }

        return response()->json( [
            'authenticated' => $authenticated
        ], 200 );
    }
    public function userInfo(){
        try {
            $id = Auth::id();
            $user = static::getSessionInfo($id);
            return response()->json([
                'status' => 200,
                'user' => $user
            ],200);
        }
        catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public static function getTOTPSecret() {
        $otp = TOTP::create();
        // Secret that should be stored with the user
        $secret = $otp->getSecret();
        return $secret;
    }

    public static function generateTOTPUri($secret,$label,$authToken){
        $otp = TOTP::create($secret);
        $otp->setLabel($label);
        $result = $otp->getProvisioningUri() . "&token=" . $authToken;
        return $result;
    }

    public static function verifyTOTP($secret,$code) {
        $otp = TOTP::create($secret);
        return $otp->now() == $code;
    }

    public static function mobileAuthorize(Request $request) {
        try {
            $token = $request->input('token');
            $user = Auth::user();
            $user->has_totp_activated = true;
            $user->save();
            return response()->json([
                'authorized' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function checkTOTP($id) {
        try {
            $hasTOTPActivated = false;
            $id = Crypt::decryptString($id);
            $user = User::find($id);
            if($user->has_totp_activated == "1"){
                $hasTOTPActivated = true;
            }
            return response()->json([
                'status' => 200,
                'hasTOTPActivated' => $hasTOTPActivated
            ],200);
        }
        catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public static function getSessionInfo($id)
    {
        $user = User::find( $id );
        $permissions = $user->getPermissions();
        $user->encryptedId = Crypt::encryptString($user->id);
        unset($user->id);
        return (object)[
            'permissions' => $permissions, 
            'encryptedId' => $user->encryptedId,
            'name'        => $user->name,
            'first_name'  => $user->first_name,
            'last_name'   => $user->last_name,
            'email'       => $user->email,
            'profile_id'  => $user->profile_id,
            'profile'     => $user->getprofile->name,
            'has_secret'  => isset($user->secret)
        ];
        //return $user->getprofile;
    }

    public function activateTOTP($id){
        try {
            $id = Crypt::decryptString($id);
            $user = User::find($id);
            $user->has_totp_activated = 1;
            $user->save();
            return response()->json([
                'status' => 200,
            ],200);
        }
        catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        
    }

    public function sendPasswordResetLink(Request $request)
    {
      return $this->sendResetLinkEmail($request);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Se envío correctamente el correo de restauración',
            'data' => $response
        ]);
    }
    
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'No se puede envíar un correo a la dirección espeificada']);
    }
}
