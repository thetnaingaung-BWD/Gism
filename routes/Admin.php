<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin_Controller\FaqController;
use App\Http\Controllers\Admin_Controller\HomeController;
use App\Http\Controllers\Admin_Controller\MailController;
use App\Http\Controllers\Admin_Controller\AboutController;
use App\Http\Controllers\Admin_Controller\AdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin_Controller\EnquireController;
use App\Http\Controllers\Admin_Controller\GalleryController;
use App\Http\Controllers\Admin_Controller\ProgramController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// Admin-Dashboard Page

Route::group(['middleware' => 'admin' ],function () {
    // Contact Form
    Route::get('/admin-contact-blade', [MailController::class,'contact'])->name('contact_form_blade');
    Route::get('/admin-contact-delete/{id}', [MailController::class,'delete'])->name('contact-form-delete');
    // Enquire-Form
    Route::get('/admin-enquire-form-blade', [MailController::class,'enquireForm'])->name('enquire_form_blade');
    Route::get('/admin-enquire-form-delete/{id}', [MailController::class,'delete'])->name('enquire-form-delete');
    Route::get('/admin-enquire-view-more/{id}', [MailController::class,'viewMore'])->name('enquire-view-more');

    // Admin List
    Route::get('/admin-list-blade', [AdminController::class,'index'])->name('Admin_List');
    Route::get('/add-member-blade', [AdminController::class,'addMember'])->name('Add_Member');
    Route::post('/add-member-process', [AdminController::class,'addMemberProcess'])->name('add_member_process');
     Route::group(['middleware'=>'Superadmin'],function () {
        Route::get('/admin-detail/{id}', [AdminController::class,'adminDetail'])->name('admin_detail');
        Route::get('/admin-delete/{id}', [AdminController::class,'adminDelete'])->name('admin_delete');
        Route::post('/admin-info/update', [AdminController::class,'updateAdminInfo'])->name('update_admin_info');
    });
    Route::get('/admin/search', [AdminController::class, 'search'])->name('admin_search');


    // Home
    Route::get('/admin-home', [HomeController::class,'index'])->name('admin-home');
    Route::post('/contact-mail', [HomeController::class,'contact_mail'])->name('contact_mail');
    Route::post('/edit-home', [HomeController::class,'editHomeWelcome'])->name('edit_home_welcome');
    Route::post('/edit-president', [HomeController::class,'editPresidentSpeech'])->name('edit_president');
    Route::post('/edit-vision_and_mission', [HomeController::class,'editVisionAndMission'])->name('edit_vision_and_mission');
    Route::post('/edit-contant-info', [HomeController::class,'editContactInfo'])->name('edit_contact_info');
    Route::get('/home-save', [HomeController::class,'SaveBtn'])->name('home_save_btn');
    Route::get('/home-reset', [HomeController::class,'resetBtn'])->name('home_reset_btn');

    // About
    Route::get('/admin-about', [AboutController::class,'index'])->name('admin-about');
    Route::post('/edit-welcome', [AboutController::class,'editAbout'])->name('edit_welcome');
    Route::post('/edit-history', [AboutController::class,'editHistory'])->name('edit_history');
    Route::post('/edit-about-school', [AboutController::class,'editAboutSchool'])->name('edit_about_school');
    Route::get('/about-save', [AboutController::class,'SaveBtn'])->name('about_save_btn');
    Route::get('/about-reset', [AboutController::class,'resetBtn'])->name('about_reset_btn');
    Route::get('/about-item-delete-db/{id}', [AboutController::class,'deleteFromDatabase'])->name('about_item_delete_db');
    Route::get('/about-item-delete-session/{id}', [AboutController::class,'deleteFromSession'])->name('about_item_delete_session');

    // Program
    Route::get('/admin-program', [ProgramController::class,'index'])->name('admin-program');
    Route::post('/edit-program', [ProgramController::class,'edit_program'])->name('edit-program');

    // Gallery
    Route::get('/admin-gallery', [GalleryController::class,'index'])->name('admin-gallery');
    Route::post('/edit-gallery-welcome', [GalleryController::class,'editGalleryWelcome'])->name('edit_gallery_welcome');
    Route::post('/edit-campus-life', [GalleryController::class,'editCampusLife'])->name('edit_campus_life');
    Route::post('/edit-activity', [GalleryController::class,'editActivity'])->name('edit_activity');
    Route::get('/gallery-item-delete-db/{id}', [GalleryController::class,'deleteFromDatabase'])->name('gallery_item_delete_db');
    Route::get('/gallery-item-delete-session/{id}', [GalleryController::class,'deleteFromSession'])->name('gallery_item_delete_session');
    Route::get('/gallery-save', [GalleryController::class,'SaveBtn'])->name('gallery_save_btn');
    Route::get('/gallery-reset', [GalleryController::class,'resetBtn'])->name('gallery_reset_btn');

    // FAQ
    Route::get('/admin-faq', [FaqController::class,'index'])->name('admin-faq');
    Route::post('/edit-faq-welcome', [FaqController::class,'editFaqsWelcome'])->name('edit_faq_welcome');
    Route::post('/edit-faq-content', [FaqController::class,'editFaqsContent'])->name('edit_faq_content');
    Route::get('/faq-save', [FaqController::class,'SaveBtn'])->name('faq_save_btn');
    Route::get('/faq-reset', [FaqController::class,'resetBtn'])->name('faq_reset_btn');

    // Enquire
    Route::get('/admin-enquire', [EnquireController::class,'index'])->name('admin-enquire');
    Route::post('/enquire-mail', [EnquireController::class,'enquireMail'])->name('enquire_mail');
    Route::post('/edit-enquire-welcome', [EnquireController::class,'editEnquireWelcome'])->name('edit_enquire_welcome');
    Route::post('/edit-enquire-form', [EnquireController::class,'editEnquireForm'])->name('edit_enquire_form');
    Route::get('/enquire-save', [EnquireController::class,'SaveBtn'])->name('enquire_save_btn');
    Route::get('/enquire-reset', [EnquireController::class,'resetBtn'])->name('enquire_reset_btn');

});
