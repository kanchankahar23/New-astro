<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AppApiController;
use App\Http\Controllers\Api\PublicDataController;
use App\Http\Controllers\Api\ApiChatController;
use App\Http\Controllers\PhoneCallController;
use  App\Http\Controllers\PhonepeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With,Content-Type');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/get-number', [AuthController::class, 'get_number']);
Route::post('/verify-otp', [AuthController::class, 'verify_otp']);
Route::get('/verify-token', [AuthController::class, 'authenticateWithToken'])->middleware(['web']);
Route::post('/register-otp-verify', [VerificationController::class, 'register_otp_verify'])->middleware(['web']);
Route::post('/register-details-save', [VerificationController::class, 'register_details_save'])->middleware(['web']);
Route::post('/register-password-save', [VerificationController::class, 'register_password_save'])->middleware(['web']);

//App api register
Route::post('/app-number-verify', [AppApiController::class, 'verify_register_number'])->middleware(['api']);
Route::post('/app-login', [AppApiController::class, 'app_login'])->middleware(['api']);
Route::post('/app-logout', [AppApiController::class, 'app_logout'])->middleware(['api']);
Route::post('/app-register', [AppApiController::class, 'app_register'])->middleware(['api']);
//daily horoscope
Route::post('/app-daily-horoscope', [AppApiController::class, 'app_daily_horoscope'])->middleware(['api']);
//user kundli apis
Route::post('/app-kundli-details', [AppApiController::class, 'app_kundli_details'])->middleware(['api']);

Route::post('/app-planetary-position', [AppApiController::class, 'app_plantary_position'])->middleware(['api']);

Route::post('/app-divisional-charts', [AppApiController::class, 'app_divisional_charts'])->middleware(['api']);

Route::post('/app-personal-characterstics', [AppApiController::class, 'app_personal_characterstics'])->middleware(['api']);

Route::post('/app-ascendant-report', [AppApiController::class, 'app_ascendant_report'])->middleware(['api']);

Route::post('/app-mahadasha', [AppApiController::class, 'app_mahadasha'])->middleware(['api']);

Route::post('/app-antardasha', [AppApiController::class, 'app_antardasha'])->middleware(['api']);

Route::post('/app-pratyantardasha', [AppApiController::class, 'app_pratyantardasha'])->middleware(['api']);

Route::post('/app-mahadasha-prediction', [AppApiController::class, 'app_mahadasha_prediction'])->middleware(['api']);

Route::post('/app-sade-sati', [AppApiController::class, 'app_sade_sati'])->middleware(['api']);
Route::post('/app-sade-sati-table', [AppApiController::class, 'app_sade_sati_table'])->middleware(['api']);
Route::post('/app-friendship-composite', [AppApiController::class, 'app_friendship_composite'])->middleware(['api']);
Route::post('/app-kp-houses', [AppApiController::class, 'app_kp_houses'])->middleware(['api']);
Route::post('/app-kp-houses-planet', [AppApiController::class, 'app_kp_houses_planet'])->middleware(['api']);
Route::post('/app-gem-suggestion', [AppApiController::class, 'app_gem_suggestion'])->middleware(['api']);
Route::post('/app-rudraksh-suggestion', [AppApiController::class, 'app_rudraksh_suggestion'])->middleware(['api']);
Route::post('/app-mangal-dosha', [AppApiController::class, 'app_mangal_dosha'])->middleware(['api']);
Route::post('/app-kaalsharp-dosha', [AppApiController::class, 'app_kaalsarp_dosha'])->middleware(['api']);
Route::post('/app-pitra-dosha', [AppApiController::class, 'app_pitra_dosha'])->middleware(['api']);
Route::post('/app-papasamaya', [AppApiController::class, 'app_papasamaya'])->middleware(['api']);

//user kundli matching apis
Route::post('/app-ashtakoot-matching', [AppApiController::class, 'app_ashtakoot_matching'])->middleware('api');
Route::post('/app-dashakoot-matching', [AppApiController::class, 'app_dashakoot_matching'])->middleware('api');
Route::post('/app-aggregate-matching', [AppApiController::class, 'app_aggregate_matching'])->middleware('api');
Route::post('/app-rajju-vedha-matching', [AppApiController::class, 'rajju_vedha_matching'])->middleware('api');
Route::post('/app-papasamaya-matching', [AppApiController::class, 'app_papasamaya_matching'])->middleware('api');
//numerology api
Route::post('/app-numerology-details', [AppApiController::class, 'app_numerology_details'])->middleware('api');
//panchang api
Route::post('/app-panchang-details', [AppApiController::class, 'app_panchang_details']);
//yoga's api
Route::post('/app-yogas-details', [AppApiController::class, 'app_yogas_details'])->middleware('api');
Route::post('set-astrobuddy-data',[PublicDataController::class,'index']);
Route::post('initiate-call', [PhoneCallController::class,'initiateCall']);
Route::resource('chats', ApiChatController::class);
Route::post('fetch-user-language', [AppApiController::class,'fetchUserLanguage']);
//banner api
Route::post('app-banner-image', [AppApiController::class,'appBannerImage']);
Route::post('/test-otp', [AuthController::class, 'testOtp']);

Route::post('/app-astrologers-list', [AppApiController::class, 'appAstrologerList']);
Route::post('/app-appointment-save', [AppApiController::class, 'appAppointmentSave']);
Route::post('/app-appointment-list', [AppApiController::class, 'appAppointmentList']);
Route::post('/app-chat-meeting-save', [AppApiController::class, 'chatMeetingSave']);
Route::post('/app-chat-meeting-list', [AppApiController::class, 'chatMeetingList']);
Route::post('/app-user-wallet-balance', [AppApiController::class, 'userWalletBalance']);
Route::post('app-pricing-plan', [AppApiController::class, 'appPricingPlan']);
Route::post('app-payment-initiate', [AppApiController::class, 'appPaymentInitiate']);
Route::post('app-payment-status', [AppApiController::class, 'handlePaymentStatus'])->name('app.payment.status');
Route::post('app-payment-status-kundli', [AppApiController::class, 'handlePaymentStatusKundli'])->name('app.payment.status');
Route::post('app-appointment-update', [AppApiController::class, 'appAppointmentUpdate']);
Route::post('app-accept-appointment', [AppApiController::class, 'appAcceptAppointment']);
Route::post('app-astro-earning-history', [AppApiController::class, 'appAstroEarningHistory']);
Route::post('app-update-user-details', [AppApiController::class, 'updateUserDetails']);
Route::post('app-user-details', [AppApiController::class, 'appUserDetails']);
Route::post('app-update-lastseen', [AppApiController::class, 'appUpdateLastSeen']);
Route::post('app-update-amount-per-minute', [AppApiController::class, 'updateAmountPerMinute']);
Route::post('app-user-wallet-history', [AppApiController::class, 'userWalletHistory']);
Route::get('app-letest-appointment', [AppApiController::class, 'appLatestAppointment']);
Route::post('app-save-chat-amount', [AppApiController::class, 'saveChatAmount']);
Route::post('app-rating-save', [AppApiController::class, 'appRatingSave']);
Route::post('app-get-rating', [AppApiController::class, 'appGetRatings']);
Route::post('app-all-usersIds', [AppApiController::class, 'appAllUsersIds']);
Route::post('app-deviceid-check', [AppApiController::class, 'appDeviceIdCheck']);
Route::post('app-lat-lon-api', [AppApiController::class, 'appLatLonApi']);
Route::post('app-extend-call-amount-save', [AppApiController::class, 'appExtendCallAmountSave']);

//phonpe new api
// Route::post('/payment/initiate', [AppApiController::class, 'initiatePayment']);
// Route::post('/payment/redirect', [AppApiController::class, 'paymentRedirect']);
// Route::post('/payment/callback', [AppApiController::class, 'handleCallback']);
// Route::get('/payment/status/{transactionId}', [AppApiController::class, 'checkStatus']);
Route::get('/app-meeting-kundli', [AppApiController::class, 'appMeetingKundli']);
Route::get('/total-duration', [AppApiController::class, 'totalDuration']);

Route::prefix('phonepe')->group(function () {
    Route::post('/create-order', [AppApiController  ::class, 'createOrder']);
    Route::post('/callback', [AppApiController  ::class, 'callback']);
    Route::post('/generate-checksum', [AppApiController ::class, 'generateChecksum']);
    Route::get('/status/{merchantTransactionId}', [AppApiController ::class, 'checkPaymentStatus']);
});
Route::post('register-otp-verify', [VerificationController::class, 'verifyEmailOtp']);
Route::get('appointment-details', [AppApiController::class, 'appointmentDetails']);
Route::post('register-with-email', [AppApiController::class, 'registerWithEmail']);
Route::post('verify-email-otp', [AppApiController::class, 'verifyEmailOtp']);

Route::post('register-app-user', [AppApiController::class, 'registerAppUser']);