<?php

use App\Http\Controllers\admin\CompanyProfileController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReviewController as AdminReviewController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\AddToCartController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\PricingController as FrontendPricingController;
use App\Http\Controllers\frontend\ProductController as FrontendProductController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// user
Route::get('/', [IndexController::class, 'index'])->name('index');

//product list
Route::get('/product/lists', [FrontendProductController::class, 'index'])->name('product.list');
Route::get('/product/{subcategory}/lists', [FrontendProductController::class, 'view'])->name('product.subcategory.list');
Route::get('/product/hot-products', [FrontendProductController::class, 'hotProduct'])->name('hot.product');

// product details
Route::get('/product/details/{id}', [FrontendProductController::class, 'show'])->name('product.details');

// news
Route::get('/news', [FrontendNewsController::class, 'index'])->name('news');
Route::get('/news/details/{id}', [FrontendNewsController::class, 'show'])->name('news.detail');


// about
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

// service
Route::get('/services', [FrontendServiceController::class, 'index'])->name('service');

// pricing
Route::get('/pricings', [FrontendPricingController::class, 'index'])->name('pricing');

//order
Route::get('/pricing/order/{id}', [OrderController::class, 'index'])->name('get.order');
Route::post('/order', [OrderController::class, 'store'])->name('post.order');

// Contact
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.add');

//Admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//service
Route::get('/admin/service/add', [ServiceController::class, 'index'])->name('get.service.add');
Route::post('/admin/service/add', [ServiceController::class, 'store'])->name('post.service.add');
Route::get('/admin/service/show', [ServiceController::class, 'show'])->name('service.show');
Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/admin/service/update', [ServiceController::class, 'update'])->name('service.update');
Route::post('/admin/service/delete', [ServiceController::class, 'destroy'])->name('service.delete');
Route::get('/admin/service/status/change/{id}', [ServiceController::class, 'changeStatus'])->name('service.status');

//pricing
Route::get('/admin/pricing/add', [PricingController::class, 'index'])->name('get.pricing.add');
Route::post('/admin/pricing/add', [PricingController::class, 'store'])->name('post.pricing.add');
Route::get('/admin/pricing/show', [PricingController::class, 'show'])->name('pricing.show');
Route::get('/admin/pricing/edit/{id}', [PricingController::class, 'edit'])->name('pricing.edit');
Route::post('/admin/pricing/update', [PricingController::class, 'update'])->name('pricing.update');
Route::post('/admin/pricing/delete', [PricingController::class, 'destroy'])->name('pricing.delete');
Route::get('/admin/pricing/status/change/{id}', [PricingController::class, 'changeStatus'])->name('pricing.status');

//slider
Route::get('/admin/slider/add', [SliderController::class, 'index'])->name('admin.slider');
Route::post('/admin/slider/add', [SliderController::class, 'store'])->name('slider.add');
Route::get('/admin/slider/show', [SliderController::class, 'show'])->name('slider.show');
Route::get('/admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/admin/slider/update', [SliderController::class, 'update'])->name('slider.update');
Route::post('/admin/slider/delete', [SliderController::class, 'destroy'])->name('slider.delete');
Route::get('/admin/slider/status/change/{id}', [SliderController::class, 'changeStatus'])->name('slider.status');

// company profile
Route::get('/admin/company-profile', [CompanyProfileController::class, 'index'])->name('admin.company.profile');
Route::post('/admin/company-profile/add', [CompanyProfileController::class, 'store'])->name('company.profile.add');
Route::post('/admin/company-profile/edit', [CompanyProfileController::class, 'update'])->name('company.profile.update');

//news
Route::get('/admin/news/add', [NewsController::class, 'index'])->name('admin.news');
Route::post('/admin/news/add', [NewsController::class, 'store'])->name('news.add');
Route::get('/admin/news/show', [NewsController::class, 'show'])->name('news.show');
Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::post('/admin/news/update', [NewsController::class, 'update'])->name('news.update');
Route::post('/admin/news/delete', [NewsController::class, 'destroy'])->name('news.delete');
Route::get('/admin/news/status/change/{id}', [NewsController::class, 'changeStatus'])->name('news.status');

//order
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.order');
Route::post('/admin/order/delete', [AdminOrderController::class, 'destroy'])->name('order.delete');

// team
Route::get('/admin/team/add', [TeamController::class, 'index'])->name('admin.team');
Route::post('/admin/team/add', [TeamController::class, 'store'])->name('team.add');
Route::get('/admin/team/show', [TeamController::class, 'show'])->name('team.show');
Route::get('/admin/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::post('/admin/team/update', [TeamController::class, 'update'])->name('team.update');
Route::post('/admin/team/delete', [TeamController::class, 'destroy'])->name('team.delete');
Route::get('/admin/team/status/change/{id}', [TeamController::class, 'changeStatus'])->name('team.status');

//contact
Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact');
Route::post('/admin/contact/delete', [AdminContactController::class, 'destroy'])->name('contact.delete');

Auth::routes(['register' => false]);
