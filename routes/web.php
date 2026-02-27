<?php

use App\Http\Controllers\AiCallController;
use App\Events\ChatingEvent;
use App\Http\Controllers\AppApiController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AstrologerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\KundliController;
use App\Http\Controllers\OnBoardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PhonepeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RealTimeChatController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TagmanagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletManagementController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\VideoCallController;
use App\Http\Controllers\PhoneCallController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WebsiteUserController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RejectedCandidateController;
// use App\Events\ChatingEvent;

date_default_timezone_set("Asia/kolkata");
Route::get('premiumKundli', function(){
    return view('parasar_kundli.premium_kundli_page1');
});
Route::middleware(['auth', 'verified', 'useractivity'])->group(function () {
    Route::middleware(['auth', 'verified', 'internal'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('onboard-user', [OnBoardController::class, 'onboardUser']);
        Route::post('onboard-detail/{enquiry_id}', [OnBoardController::class, 'onboardDetail']);
        Route::get('package-list', [OnBoardController::class, 'packageList']);
        Route::get('delete-package/{id}', [OnBoardController::class, 'DeletePackage']);
        Route::get('edit-package/{id}', [OnBoardController::class, 'editPackage']);
        Route::post('package-update/{id}', [OnBoardController::class, 'editPackageSave']);
        Route::get('package-create', [OnBoardController::class, 'packageCreate']);
        Route::post('package-store', [OnBoardController::class, 'packageStore']);
        Route::get('edit-astrologer', [OnBoardController::class, 'editAstrologer']);
        Route::post('onboard-edit-store/{id}', [OnBoardController::class, 'onboardEditStoreSave']);
        Route::match(['get', 'post'], 'onboarded-astrologer', [OnBoardController::class, 'onboardedAstrologer']);
        Route::prefix('enquiry')->group(function () {
            route::get('/enquiry-list', [EnquiryController::class, 'enquiry_list']);
            route::get('/enquiry-form', [EnquiryController::class, 'enquiry_form']);
            route::post('/enquiry-save', [EnquiryController::class, 'enquiry_save']);
            route::post('/import-enquiry', [EnquiryController::class, 'import']);
            Route::get('remove-enquiry-user', [EnquiryController::class, 'deleteEnquiry']);
            route::get('/appointment-list', [EnquiryController::class, 'appointment_list']);
            route::get('/delete-appointment/{id}', [EnquiryController::class, 'delete_appointment']);
        });

        Route::get('admin/dashboard', [UserController::class, 'adminDashboard']);
        Route::prefix('users')->group(function () {
            route::get('/register', [UserController::class, 'register']);
            route::get('/user-list', [UserController::class, 'user_list']);
            route::post('/user-save', [UserController::class, 'user_save']);
            route::get('/edit-user/{id}', [UserController::class, 'edit_user']);
            route::post('/update/{id}', [UserController::class, 'update']);
            route::post('/get-parent', [UserController::class, 'get_parent']);
            route::post('/reset-password', [UserController::class, 'reset_password']);
        });
    });
    Route::middleware(['auth', 'verified', 'astrologer'])->group(function () {
        Route::get('astrologer', [AstrologerController::class, 'index'])->name('astrologer');
        Route::get('/astrologer-appointments', [AstrologerController::class, 'astrologer_appointments']);
        Route::post('save-astrologer-details/{id}', [AstrologerController::class, 'save_astrologer_details']);
        Route::get('/astrologer-dashboard', [AstrologerController::class, 'website_dashboard']);
        Route::post('accept-appointment', [AstrologerController::class, 'accept_appointment']);
        Route::get('create-astro-meeting/{id}', [VideoCallController::class, 'create_astro_meeting']);
        Route::get('chats', [AstrologerController::class, 'listed_chats']);
        Route::get('initiate-call/{id}', [PhoneCallController::class, 'initiateCallAstrologerEnd']);
        //shainki
        Route::get('astro-earning-history', [AstrologerController::class, 'astroEarningHistory']);
        Route::get('withdraw-money', [AstrologerController::class, 'withdrawMoney']);
        Route::post('save-withdrow-request', [AstrologerController::class, 'saveWithdrawRequest']);

    });
    Route::middleware(['auth', 'verified', 'user'])->group(function () {
        Route::get('user', [WebsiteUserController::class, 'index'])->name('user');
        Route::post('save-user-details/{id}', [WebsiteUserController::class, 'save_user_details']);
        Route::get('/pricing', [PackageController::class, 'packages']);
        Route::get('upcoming-appointments', [WebsiteUserController::class, 'upcoming_appointments']);
        Route::get('chat-with', [WebsiteUserController::class, 'chat_with']);
        Route::get('schedule/{id}', [WebsiteUserController::class, 'schedule']);
        Route::get('/user-dashboard', [WebsiteUserController::class, 'website_dashboard']);
        Route::get('/search', [WebsiteUserController::class, 'astrologer_search']);
        Route::get('wallet', [RazorpayController::class, 'wallet'])->name('wallet');
        Route::get('delete-appointment/{id}', [WebsiteUserController::class, 'deleteAppointment']);
        Route::get('astrologer-share', [WebsiteUserController::class, 'astrologerShare']);
        Route::post('shared-astrologer', [WebsiteUserController::class, 'sharedAstrologer']);
        Route::get('verify/{id}', [WebsiteUserController::class, 'verify_balance']);
        Route::get('chat-list', [WebsiteUserController::class, 'chat_list']);
        Route::get('premium-kundli', [PdfController::class, 'premium_kundli']);
        Route::get('chat-details-user/{id?}', [WebsiteUserController::class, 'chat_details']);


    });
    Route::post('store-rating', [ChatController::class, 'store_rating']);
    Route::post('store-video-rating', [VideoCallController::class, 'store_video_rating']);
    Route::post('goto-chat/{id}', [ChatController::class, 'goto_chat']);
    Route::post('save-chat-time', [ChatController::class, 'save_chat_time']);
    Route::post('start-chat-time', [ChatController::class, 'startTime']);
    Route::view('appointed-user-detail', 'website.appointed_user_detail');
    Route::get('astrologer-detail', [WebsiteController::class, 'astrologerDetail']);
    Route::get('upload-premium-kundli/{id}', [PdfController::class, 'addPremiumKundli'])->middleware('auth', 'verified');
    Route::post('store-premium-kundli', [PdfController::class, 'storePremiumKundli'])->middleware('auth', 'verified');

    Route::get('/kundlipdf-payment', [PdfController::class, 'kundliPdfPayment'])->middleware('auth', 'verified');
    Route::post('/initiate-kundlipdf-payment', [PdfController::class, 'initiateKundaliPdfPayment'])->middleware('auth', 'verified');
    Route::get('premium-kundli-users', [PdfController::class, 'premiumKundliUsers'])->middleware('auth', 'verified');
    Route::get('/chat', [WebsiteController::class, 'chat'])->middleware(['auth', 'verified']);
    Route::view('change-profile-picture', 'website.profile_picture')->middleware(['auth', 'verified']);
    Route::post('save-profile-picture/{id}', [WebsiteController::class, 'save_profile_picture'])->middleware(['auth', 'verified']);

    Route::post('decresed-amount', [ChatController::class, 'deduct_amount']);

    Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
    Route::get('pandit-profile/{id}', [WebsiteController::class, 'panditProfile']);
    Route::get('recharge-history/{id}', [RazorpayController::class, 'rechargeHistory']);
    Route::get('bonus-invoice/{id}', [RazorpayController::class, 'bonusInvoice']);

    Route::get('all-user-transection', [RazorpayController::class, 'allInvoice']);
    Route::get('all-astrologer', [UserController::class, 'allAstrologer']);
    Route::get('all-user', [UserController::class, 'allusers']);
    Route::get('share-link', [AstrologerController::class, 'shareLink']);
    Route::post('add-money', [RazorpayController::class, 'addMoney']);
    Route::get('add-amount', [RazorpayController::class, 'addAmount']);
    Route::post('initiate-wallet-payment', [PhonepeController::class, 'initiateWalletPayment']);
    Route::post('add-money-from-popup', [RazorpayController::class, 'addMoney']);
    Route::post('instant-recharge', [ChatController::class, 'instant_recharge']);
    Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    //admin
    Route::get('account-history', [ReportController::class, 'accountHistory']);
    Route::get('wallet-history', [ReportController::class, 'walletHistory']);
    Route::get('transaction-history/{id}', [WebsiteUserController::class, 'transactionHistory']);
    Route::get('user-transaction-details/{id}', [AstrologerController::class, 'userTransactionDetails']);
    Route::get('kundli-matching-users', [KundliController::class, 'kundliMatchingUser']);
    Route::get('kundli-users', [KundliController::class, 'kundliUser']);
    Route::get('astrologer-payment-list', [ReportController::class, 'astrologerPayment']);
    Route::get('Approve-withdraw-request/{id}', [ReportController::class, 'approveWithdrawRequest']);
    Route::get('asign-tag-model', [ReportController::class, 'asignTagModel']);
    Route::post('asign-astrologer-tag', [ReportController::class, 'asignAstrologerTag']);
    Route::get('astrologer-payment-model', [ReportController::class, 'astrologerpaymentModel']);
    Route::post('make-astrologer-payment', [ReportController::class, 'makeAstrologerPayment']);
    Route::post('deduct-wallet', [RealTimeChatController::class, 'deductWallet']);
    //astro app
    Route::get('add-appointment-banner', [AppController::class, 'addAppointmentBanner']);
    Route::post('save-banner', [AppController::class, 'saveBanner']);
    Route::get('edit-banner', [AppController::class, 'editBanner']);
    Route::post('update-banner/{id}', [AppController::class, 'updateBanner']);
    Route::get('delete-banner/{id}', [AppController::class, 'deleteBanner']);

    Route::Get('tag-management', [TagmanagementController::class, 'tagCreate']);
    Route::POST('tag-store', [TagmanagementController::class, 'tagStore']);
    Route::get('tag-list', [TagmanagementController::class, 'tagList']);
    Route::get('edit-tag/{id}', [TagmanagementController::class, 'editTag']);
    Route::POST('tag-edit/{id}', [TagmanagementController::class, 'TagEdit']);
    Route::get('delete-tag/{id}', [TagmanagementController::class, 'deleteTag']);
    Route::post('check-name', [TagmanagementController::class, 'checkName']);

    //real time chat
    Route::get('real-time-chat/{id}', [RealTimeChatController::class, 'realTimeChat']);
    Route::get('chat/decline/{id}', [RealTimeChatController::class, 'declineChat']);
    Route::post('chat/trigger-accept/{id}', [RealTimeChatController::class, 'triggerAccept']);
    Route::get('user-chat-list', [RealTimeChatController::class, 'userChatList']);
    Route::get('/chat/messages', [RealTimeChatController::class, 'fetchMessages']);
    Route::post('/get/messages', [RealTimeChatController::class, 'getMessages']);
});
Route::get('/', [WebsiteController::class, 'index']);
Route::get('/vastu-shastra', [WebsiteController::class, 'vastu_shastra']);
Route::get('/signature', [WebsiteController::class, 'signature']);
Route::get('/appointment', [WebsiteController::class, 'appointment']);
Route::get('/contact-us', [WebsiteController::class, 'contact_us']);
// Route::get('/kundali-details', [WebsiteController::class, 'kundli_details']);
Route::get('/astrologers', [WebsiteController::class, 'astrologers']);
Route::get('/astro-profile', [WebsiteController::class, 'profile']);
Route::get('/shri-{id}', [WebsiteController::class, 'portfolio'])->name('portfolio');
Route::post('/postapi', [WebsiteController::class, 'postapi']);
Route::get('terms-condition', [WebsiteController::class, 'termsAndCondition']);
Route::get('privacy-policy', [WebsiteController::class, 'privacyAndpolicy']);
route::view('/temp', 'index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kundli', [WebsiteController::class, 'kundli']);
    Route::get('/api/geo-search', [KundliController::class, 'getSuggestions']);
    Route::post('/get-kundli-details', [KundliController::class, 'get_basic_kundli']);
    Route::get('/get-planetory-positions', [KundliController::class, 'getPlanetoryPositions']);
    Route::get('/get-kundli-charts', [KundliController::class, 'get_kundli_chart']);
    Route::get('/get-charts', [KundliController::class, 'get_chart']);
    Route::get('/get-navamsha-chart', [KundliController::class, 'get_navamsha_chart']);
    Route::get('/get-moon-chart', [KundliController::class, 'get_moon_chart']);
    Route::get('/get-sun-chart', [KundliController::class, 'get_sun_chart']);
    Route::get('/get-chalit-chart', [KundliController::class, 'get_chalit_chart']);
    Route::get('/get-bhava-kundli-charts', [KundliController::class, 'get_bhava_kundli_chart']);
    Route::get('/get-maha-dasha', [KundliController::class, 'get_maha_dasha']);
    Route::get('get-antar-dasha', [KundliController::class, 'get_antar_dasha']);
    Route::get('/get-paryantar-dasha', [KundliController::class, 'get_paryantar_dasha']);
    Route::get('/get-mahadasha-prediction', [KundliController::class, 'get_mahadasha_prediction']);
    Route::get('/get-sade-sati', [KundliController::class, 'get_sade_sati']);
    Route::get('/get-sade-sati-table', [KundliController::class, 'get_sade_sati_table']);
    Route::get('/get-friendship-table', [KundliController::class, 'get_friendship_table']);
    Route::get('/get-kp-houses', [KundliController::class, 'get_kp_houses']);
    Route::get('/get-kp-houses-planet', [KundliController::class, 'get_kp_houses_planet']);
    Route::get('/get-gem-suggestion', [KundliController::class, 'get_gem_suggestion']);
    Route::get('/get-rudraksh-suggestion', [KundliController::class, 'get_rudraksh_suggestion']);

    Route::get('/get-personal-characterstics', [KundliController::class, 'get_personal_characterstics']);
    Route::get('/get-ascendant-report', [KundliController::class, 'get_ascendant_report']);
    Route::get('/get-planet-report', [KundliController::class, 'get_planet_report']);
    Route::get('/get-composite-friendship-chart', [KundliController::class, 'composite_friendship_chart']);
    Route::get('/get-mangal-dosha', [KundliController::class, 'get_mangal_dosha']);
    Route::get('/get-kaalsharp-dosha', [KundliController::class, 'get_kaalsharp_dosha']);
    Route::get('/get-pitra-dosha', [KundliController::class, 'get_pitra_dosha']);
    Route::get('/get-papasamaya', [KundliController::class, 'get_papasamaya']);
    Route::get('/kundli-matching', [KundliController::class, 'KundliMatching']);
    Route::get('/get-dashakoot-matching', [KundliController::class, 'get_dashakoot_matching']);
    Route::get('/get-aggregate-matching', [KundliController::class, 'get_aggregate_matching']);
    Route::get('/get-rajju-vedha-matching', [KundliController::class, 'get_rajju_vedha_matching']);
    Route::get('/get-papasamaya-matching', [KundliController::class, 'get_papasamaya_matching']);
    Route::post('/kundli-matching-details', [KundliController::class, 'KundliMatchingDetails']);
    Route::get('/numerology', [KundliController::class, 'numerology']);
    Route::post('/get-numerology-details', [KundliController::class, 'get_numerology_details']);
});
Route::get('{report_type}/horoscope/{id}', [KundliController::class, 'dailyHoroscopeSign']);
Route::get('{report_type}/horoscope-response/{id}', [KundliController::class, 'horoscopeResponse']);
Route::post('get-panchang-details', [KundliController::class, 'getPanchangDetails']);
Route::get('get-yogas', [KundliController::class, 'getYogasForm']);
Route::post('yogas-details', [KundliController::class, 'getYogasDetails']);

Route::get('logout', [UserController::class, 'logOut']);
Route::post('enquiry/website-enquiry', [EnquiryController::class, 'website_enquiry']);
Route::post('enquiry/appointment/{id}', [EnquiryController::class, 'appointment'])->middleware(['auth', 'verified']);

// Register user routes
Route::view('mobile-verify', 'otp_verify.register_mobile');
Route::post('mobile-verified', [VerificationController::class, 'register_mobile_verify']);
Route::view('register-details', 'otp_verify.register_name');
Route::view('register-password', 'otp_verify.register_password');
//Login user routes
Route::view('otp', 'otp_verify.mobile_verify');
Route::view('otp-verify/{id}', 'otp_verify.otp');

Route::get('event', function () {
    event(new ChatingEvent('hello event'));
});


Route::view('loader', 'loader.loader');

// Route::get('meeting',[VideoCallController::class,'create']);
// Route::get('create-meeting',[VideoCallController::class,'create_meeting']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('join-meeting/{url}', [VideoCallController::class, 'join_meeting']);
    Route::post('save-video-time', [VideoCallController::class, 'save_video_time']);
    Route::post('complete-video-stream', [VideoCallController::class, 'complete_video_stream']);
});
Route::post('/saveUserName', [VideoCallController::class, 'saveUserName'])->name('saveUserName');
Route::post('/meetingApprove', [VideoCallController::class, 'meetingApprove'])->name('meetingApprove');
Route::get('join', [VideoCallController::class, 'join']);
Route::get('recording', [VideoCallController::class, 'recording']);

Route::view('second', 'popup.kundli_popup');
Route::get('all-appointment', [UserController::class, 'allAppointment']);
Route::get('not-today-appointment', [UserController::class, 'notTodayAppointment']);

Route::get('cover-image', [AstrologerController::class, 'coverImage']);
Route::get('about-image', [AstrologerController::class, 'aboutImage']);
Route::get('gallery-image', [AstrologerController::class, 'galleryImage']);
Route::get('astrologer-gallery', [AstrologerController::class, 'gallaryPage']);
Route::post('astrologer-gallery/{id}', [AstrologerController::class, 'astrologoerGallery']);

Route::get('/portfolio-gallery/{imageType}/{userId}', [AstrologerController::class, 'show']);
require __DIR__ . '/auth.php';


Route::match(['get', 'post'], 'allover-transection', [ReportController::class, 'alloverTransection']);
Route::get('all-transection-user/{id}', [ReportController::class, 'allTransectionUser']);
Route::match(['GET', 'POST'], 'user-appointment', [ReportController::class, 'userAppointment']);
Route::get('all-bonus', [ReportController::class, 'allBonus']);
Route::get('/appointment-detail/{id}', [ReportController::class, 'appointmentDetail']);


Route::match(['get', 'post'], 'astro-user', [ReportController::class, 'astroUser']);
Route::get('privecy-policy', [WebsiteController::class, 'privecyPolicy']);

// Parasar PDF
// Route::get('add-header-footer', [PdfController::class, 'addHeaderFooter']);
Route::get('create-parasar-pdf', [PdfController::class, 'createParasarPdf']);
Route::post('/replace-word', [PdfController::class, 'replaceWordInPdf']);
//wallet management
Route::post('wallet-management', [WalletManagementController::class, 'walletManagement']);
Route::get('/load-kundli-popup', function () {
    $meeting_id = request()->meeting_id;
    $vcMeeting_id = request()->meeting_id; // Retrieve any necessary data
    $name = request()->name;
    $dob = request()->dob;
    $tob = request()->tob;
    $place = request()->place;
    $type = request()->type;
    return view('popup.kundli_details_popup', compact('meeting_id', 'name', 'dob', 'tob', 'place', 'type'));
})->name('load.kundli_popup');

Route::get('appointment-history', [ReportController::class, 'appointmentHistory']);
Route::get('special-bonus', [ReportController::class, 'specialBonus']);
Route::get('add-bonus/{id}', [ReportController::class, 'addBonus']);
Route::post('add-bonus/{id}', [ReportController::class, 'addBonusData']);
Route::get('appointment-details/{id}', [ReportController::class, 'appointmentsHistory']);
Route::post('/save-chatbot-response', [EnquiryController::class, 'saveChatBotResponse']);
Route::get('enquiries/{enquiryType}', [EnquiryController::class, 'websiteEnquiry']);
Route::get('enquiries/{enquiryType}/{type}', [EnquiryController::class, 'websiteEnquiry']);

Route::get('appointment/{type}/{id}', [EnquiryController::class, 'appointmentForm'])->middleware(['auth', 'verified']);
Route::post('book-appointment', [EnquiryController::class, 'bookAppointment']);

// Route::get('chat-appointment/{id}', [EnquiryController::class, 'chatAppointment']);


// divine stones website
Route::get('divine-stone', [WebsiteController::class, 'divineStone']);
Route::get('astro-appointment/{id}', [AstrologerController::class, 'astroAppointment']);
// Route::post('/accept-chat', [ChatController::class, 'acceptChat']);

Route::post('/accept-chat', [ChatController::class, 'acceptChat']);

Route::post('/video-call/request/{id}', [VideoCallController::class, 'request']);
Route::post('/video-call/decline/{id}', [VideoCallController::class, 'decline']);

//AISENCY API

Route::get('whatsapp-message', [WhatsappController::class, 'whatsappMessage']);
Route::match(['get', 'post'], '/send-message', [WhatsappController::class, 'sendMessage']);
Route::post('add-contact', [WhatsappController::class, 'addContact']);
Route::get('whatsapp-response-list', [WhatsappController::class, 'whatsappResponseList']);

Route::get('/notification/read/{id}', [NotificationController::class, 'markAsRead'])->name('notification.read');
Route::post('/video-call/accept/{id}', [VideoCallController::class, 'accept']);
Route::post('/video-call/decline/{id}', [VideoCallController::class, 'decline']);
Route::post('/complete-video-call', [VideoCallController::class, 'completeVideoCall'])->name('appointments.complete');
// Route::get('/video-call/1', function () {
//     return view('video.video_call_new');
// });
// Route::get('/video-call/{id}', function ($id) {
//     return view('video.video_call_new', ['userId' => $id]);
// });
// Route::get('/video-call/{callerId}/{calleeId}', function ($callerId, $calleeId) {
//     return view('video.video_call_new', ['callerId' => $callerId, 'calleeId' => $calleeId]);
// });
Route::get('/video-call/{sender}/{receiver}', function ($sender, $receiver) {
    return view('video.video_call_new', ['sender' => $sender, 'receiver' => $receiver]);
});


Route::post('/appointments/check-wallet', [VideoCallController::class, 'checkWallet'])->name('appointments.checkWallet');

Route::post('/appointments/update-duration', [VideoCallController::class, 'updateDuration'])->name('appointments.updateDuration');

Route::post('/appointments/deduct-wallet-per-minute', [VideoCallController::class, 'deductWalletPerMinute'])->name('appointments.deductWalletPerMinute');

Route::post('/save-rating', [MeetingController::class, 'saveRating']);

Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    return ['success' => true, 'message' => 'Cleared'];
});

// shiv mehra changes
Route::get('whatsapp-message', [WhatsAppController::class, 'whatsappMessage']);
Route::match(['get', 'post'], '/send-message', [WhatsAppController::class, 'sendMessage']);
Route::post('add-contact', [WhatsAppController::class, 'addContact']);
Route::get('whatsapp-response-list', [WhatsAppController::class, 'whatsappResponseList']);
Route::get('rejected-candidate', [RejectedCandidateController::class, 'rejectedCandidate']);
Route::post('/rejected-candidate-message', [RejectedCandidateController::class, 'rejectedCandidateMessage']);
Route::get('sms-remark', [WhatsAppController::class, 'smsRemark']);
Route::post('sms-remark', [WhatsAppController::class, 'smsRemarkSave']);

Route::post('/pusher/user-left-call', [VideoCallController::class, 'userLeftCall'])->name('pusher.userLeftCall');

// Route::post('/appointments/update-duration', [VideoCallController::class, 'updateDuration'])->name('appointments.updateDuration');
Route::get('/test-broadcast', function () {
    broadcast(new \App\Events\CallExtended(5));
    return 'Event sent';
});
Route::post('/change-status', [EnquiryController::class, 'changeStatus'])->name('change-status');
Route::Post('initiate-payment', [PhonepeController::class, 'initiatePayment']);
Route::Post('payment-status', [PhonepeController::class, 'handlePaymentStatus']);
//kundli web view routes for app

Route::get('/kundli-app', [WebsiteController::class, 'kundli']);
Route::get('/api/geo-search', [KundliController::class, 'getSuggestions']);
Route::post('/get-kundli-details-app', [KundliController::class, 'get_basic_kundli']);
Route::get('/get-planetory-positions-app', [KundliController::class, 'getPlanetoryPositions']);
Route::get('/get-kundli-charts-app', [KundliController::class, 'get_kundli_chart']);
Route::get('/get-navamsha-chart-app', [KundliController::class, 'get_navamsha_chart']);
Route::get('/get-moon-chart-app', [KundliController::class, 'get_moon_chart']);
Route::get('/get-sun-chart-app', [KundliController::class, 'get_sun_chart']);
Route::get('/get-chalit-chart-app', [KundliController::class, 'get_chalit_chart']);
Route::get('/get-bhava-kundli-charts-app', [KundliController::class, 'get_bhava_kundli_chart']);
Route::get('/get-maha-dasha-app', [KundliController::class, 'get_maha_dasha']);
Route::get('get-antar-dasha-app', [KundliController::class, 'get_antar_dasha']);
Route::get('/get-paryantar-dasha-app', [KundliController::class, 'get_paryantar_dasha']);
Route::get('/get-mahadasha-prediction-app', [KundliController::class, 'get_mahadasha_prediction']);
Route::get('/get-sade-sati-app', [KundliController::class, 'get_sade_sati']);
Route::get('/get-sade-sati-table-app', [KundliController::class, 'get_sade_sati_table']);
Route::get('/get-friendship-table-app', [KundliController::class, 'get_friendship_table']);
Route::get('/get-kp-houses-app', [KundliController::class, 'get_kp_houses']);
Route::get('/get-kp-houses-planet-app', [KundliController::class, 'get_kp_houses_planet']);
Route::get('/get-gem-suggestion-app', [KundliController::class, 'get_gem_suggestion']);
Route::get('/get-rudraksh-suggestion-app', [KundliController::class, 'get_rudraksh_suggestion']);
Route::get('/get-personal-characterstics-app', [KundliController::class, 'get_personal_characterstics']);
Route::get('/get-ascendant-report-app', [KundliController::class, 'get_ascendant_report']);
Route::get('/get-planet-report-app', [KundliController::class, 'get_planet_report']);
Route::get('/get-composite-friendship-chart-app', [KundliController::class, 'composite_friendship_chart']);
Route::get('/get-mangal-dosha-app', [KundliController::class, 'get_mangal_dosha']);
Route::get('/get-kaalsharp-dosha-app', [KundliController::class, 'get_kaalsharp_dosha']);
Route::get('/get-pitra-dosha-app', [KundliController::class, 'get_pitra_dosha']);
Route::get('/get-papasamaya-app', [KundliController::class, 'get_papasamaya']);
Route::get('/email-form', [VerificationController::class, 'form'])->name('email.form');
Route::post('/email-form', [VerificationController::class, 'sendOtp'])->name('send.email.otp');

Route::get('/start-ai-call', [AiCallController::class, 'start']);
// Route::post('/ai-call-flow', [AiCallController::class, 'flow'])->name('ai.call.flow');

Route::post('/ai-call-response', [AiCallController::class, 'response'])->name('ai.call.response');

Route::get('/test-log', function () {
    \App\Models\AiCallLog::create([
        'response' => 'test',
        'status' => 'Interested'
    ]);
    return 'OK';
});
Route::post('/register-otp-verify', [VerificationController::class, 'register_otp_verify'])->middleware(['web']);
Route::get('/ai-call-flow', function () {
    return response(
        '<?xml version="1.0" encoding="UTF-8"?>
        <Response>
            <Say>Hello route test</Say>
        </Response>',
        200,
        ['Content-Type' => 'text/xml']
    );
});
