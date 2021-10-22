<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SeekerController;

Route::get('/', function () {return view('pages.home');})->name('home');

Route::get('/admin/registration',[RegistrationController::class,'adminRegistration'])->name('adminSignup');
Route::post('/admin/registration',[RegistrationController::class,'validateAdminRegistration'])->name('adminSignup');
Route::get('/seeker/registration',[RegistrationController::class,'seekerRegistration'])->name('seekerSignup');
Route::post('/seeker/registration',[RegistrationController::class,'validateSeekerRegistration'])->name('seekerSignup');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginCheck'])->name('login');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact',[ContactController::class,'validateContact'])->name('contact');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
Route::get('/admin/dash',[AdminController::class,'dashboard'])->name('dashboardAdmin')->middleware('AdminIsValidCheck');
Route::get('/seeker/dash',[SeekerController::class,'dashboard'])->name('dashboardSeeker')->middleware('SeekerIsValidCheck');
Route::get('/admin/edit',[AdminController::class,'editAdminInfo'])->name('editAdminInfo')->middleware('AdminIsValidCheck');
Route::post('/admin/edit',[AdminController::class,'adminInfoUpdate'])->name('adminInfoUpdate')->middleware('AdminIsValidCheck');
Route::get('/seeker/edit',[SeekerController::class,'editSeekerInfo'])->name('editSeekerInfo')->middleware('SeekerIsValidCheck');
Route::post('/seeker/edit',[SeekerController::class,'seekerInfoUpdate'])->name('seekerInfoUpdate')->middleware('SeekerIsValidCheck');
Route::get('/seeker/list',[AdminController::class,'seekersList'])->name('seekersList')->middleware('AdminIsValidCheck');
