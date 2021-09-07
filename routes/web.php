<?php

use App\Http\Controllers\PaymentController;

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin category
Route::get('admin/category', 'admin\category\CategoryController@category')->name('categories');
Route::post('admin/category/store', 'admin\category\CategoryController@categoryStore')->name('category.store');
Route::get('categorry/delete/{id}', 'admin\category\CategoryController@categoryDelete')->name('category.delete');
Route::get('categorry/edit/{id}', 'admin\category\CategoryController@categoryEdit')->name('category.edit');
Route::post('category/update/{id}', 'admin\category\CategoryController@categoryUpdate')->name('category.update');

// Brands
Route::get('admin/brands', 'admin\category\BrandController@brand')->name('brands');
Route::post('admin/brand/store', 'admin\category\BrandController@brandStore')->name('brand.store');
Route::get('brand/delete/{id}', 'admin\category\BrandController@brandDelete')->name('brand.delete');
Route::get('brand/edit/{id}', 'admin\category\BrandController@brandEdit')->name('brand.edit');
Route::post('brand/update/{id}', 'admin\category\BrandController@brandUpdate')->name('brand.update');

//sub categories
Route::get('admin/subcategories', 'admin\category\SubcategoryController@subcategory')->name('sub.categories');
Route::post('admin/subcategories/store', 'admin\category\SubcategoryController@subcategoryStore')->name('subcategory.store');
Route::get('subcategorry/delete/{id}', 'admin\category\SubcategoryController@subcategoryDelete')->name('subcategory.delete');
Route::get('subcategorry/edit/{id}', 'admin\category\SubcategoryController@subcategoryEdit')->name('subcategory.edit');
Route::post('subcategory/update/{id}', 'admin\category\SubcategoryController@subcategoryUpdate')->name('subcategory.update');
// Coupons
Route::get('admin/coupons', 'admin\category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/coupons/store', 'admin\category\CouponController@couponStore')->name('coupon.store');
Route::get('coupon/delete/{id}', 'admin\category\CouponController@couponDelete')->name('coupon.delete');
Route::get('coupon/edit/{id}', 'admin\category\CouponController@couponEdit')->name('coupon.edit');
Route::post('coupon/update/{id}', 'admin\category\CouponController@couponUpdate')->name('coupon.update');
// Newsletters
Route::get('admin/newsletter','admin\category\CouponController@NewSletter')->name('admin.newsletter');
//Get subcat by ajax
Route::get('/get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

//Product Route
Route::get('admin/product/all','Admin\ProductController@index')->name('product.all');
Route::get('admin/product/add','Admin\ProductController@create')->name('product.add');
Route::post('admin/product/store','Admin\ProductController@store')->name('product.store');
Route::get('product/inactive/{id}','Admin\ProductController@inactive');
Route::get('product/active/{id}','Admin\ProductController@active');
Route::get('product/delete/{id}','Admin\ProductController@delete');
Route::get('product/show/{id}','Admin\ProductController@showProduct');
Route::get('product/edit/{id}','Admin\ProductController@editProduct');
Route::post('product/update/{id}','Admin\ProductController@updateProduct');


//Post Route
Route::get('blog/categorylist','Admin\PostController@blogcatList')->name('add.blog.categorylist');
Route::post('blog/categorylist/add','Admin\PostController@blogcatStore')->name('postcategory.store');
Route::get('blog/category/delete/{id}','Admin\PostController@blogpostcatDelete');
Route::get('blog/categorry/edit/{id}','Admin\PostController@blogpostcatEdit');
Route::post('blog/category/update/{id}','Admin\PostController@blogpostcatUpdate');
Route::get('blog/post/add/','Admin\PostController@blogpostAdd')->name('blogpost.add');
Route::get('blog/post/all/','Admin\PostController@blogpostIndex')->name('blogpost.all');
Route::post('blog/post/store/','Admin\PostController@blogpostStore')->name('blogpost.store');
Route::get('blog/post/delete/{id}','Admin\PostController@blogpostDelete');
Route::get('blog/post/edit/{id}','Admin\PostController@blogpostEdit');
Route::post('blogpost.update/{id}','Admin\PostController@blogpostUpdate');

//Admin order Route
Route::get('admin/order/neworder','Admin\OrderController@newOrder')->name('admin.neworder');
Route::get('admin/order/view/{id}','Admin\OrderController@viewOrder');
Route::get('admin/order/accept/{id}','Admin\OrderController@acceptOrder');
Route::get('admin/order/cancel/{id}','Admin\OrderController@cancelOrder');
Route::get('admin/order/payment-accept-list','Admin\OrderController@pendingOrder')->name('admin.accept.payment');
Route::get('admin/order/cancel-order-list','Admin\OrderController@OrderCancelList')->name('admin.cancel.order');
Route::get('admin/order/process-list','Admin\OrderController@OrderProcessList')->name('admin.process.delivery');
Route::get('admin/order/delivered-list','Admin\OrderController@OrderDeliveryList')->name('admin.delivery.success');
Route::get('admin/order/shifted/process/{id}','Admin\OrderController@ProcessOrder');
Route::get('admin/order/shifted/delivered/{id}','Admin\OrderController@DeliveredOrder');
//SEO route
Route::get('admin/seo','Admin\OrderController@seoSec')->name('admin.seo');
Route::post('admin/seo/update/{id}','Admin\OrderController@seoUpdate');

//Admin Report order
Route::get('admin/order/report/today/order','ReportController@todayOrder')->name('order.today');
Route::get('admin/order/report/today/delivery','ReportController@todayDelivery')->name('today.delivery');
Route::get('admin/order/report/month/delivery','ReportController@monthDelivery')->name('month.delivery');
Route::get('admin/order/report/search','ReportController@searchOrder')->name('search.report');
Route::post('admin/report/search/by/year','ReportController@searchByYear');
Route::post('admin/report/search/by/month','ReportController@searchByMonth');
Route::post('admin/report/search/by/date','ReportController@searchByDate');


//Admin User Role 
Route::get('admin/user/role/all','Admin\UserRoleController@allUser')->name('admin.all.user');
Route::get('admin/user/role/create','Admin\UserRoleController@createRole')->name('admin.create.role');
Route::post('admin/user/role/store/admin','Admin\UserRoleController@storeAdmin')->name('admin.store');
Route::get('admin/delete/user/role/{id}','Admin\UserRoleController@deleteRoleAdmin');
Route::get('admin/edit/user/role/{id}','Admin\UserRoleController@editRoleAdmin');
Route::post('admin/edit/user/role/update','Admin\UserRoleController@updateRoleAdmin')->name('admin.update');

//admin site setting
Route::get('admin/site/setting','Admin\SiteSettingController@siteSetting')->name('admin.site.setting');
Route::post('admin/site/setting/udpate','Admin\SiteSettingController@siteSettingUpdate')->name('siteSetting.update');

//Admin Product Stock
Route::get('admin/product/stock','Admin\UserRoleController@productStock')->name('admin.product.stock');


//Frontend Routes
Route::post('user/subscribe','FrontendController@newsletterStore')->name('newsletter.store');
Route::get('subscribe/delete/{id}','FrontendController@newsletterDelete');
Route::get('register/index','FrontendController@registerIndex')->name('registerIndex');
Route::get('/campaigns','FrontendController@campaignsIndex')->name('campaigns');



// WishList
Route::get('add/wishlist/{id}','WishlistController@wishlistAdd');
// Cart
Route::get('add/cart/{id}','CartController@cartAdd');
Route::get('cart/view','CartController@CartShow')->name('cartshow');
Route::get('remove/cart/{rowId}','CartController@CartRemove');
Route::post('cart/update/item','CartController@CartUpdate')->name('update.Cartitem');
Route::get('cart/product/quick/view/{id}','CartController@Cartquickview');
Route::post('cart/add/item/quickview','CartController@CartInsert')->name('insert.into.cart');
Route::get('cart/item/checkout','CartController@CartCheckout')->name('user.checkout');
Route::get('cart/item/wishlist','CartController@UserWishlist')->name('user.wishlist');
Route::post('cart/item/wishlist','CartController@CouponApply')->name('apply.coupon');
Route::get('checkout/item/coupon/remove','CartController@CouponRemove')->name('coupon.remove');


Route::get('check','CartController@check');


// Product details
Route::get('product/details/{id}/{product_name}','ProductController@showProduct');
Route::post('cart/product/add/{id}','ProductController@cartAdd');


// Blog post
Route::get('blog/post','BlogController@blog')->name('blog.post');

Route::get('page/lang/hindi','BlogController@langHindi')->name('lang.hindi');
Route::get('page/lang/bangla','BlogController@langBangla')->name('lang.bangla');
Route::get('page/lang/english','BlogController@langEnglish')->name('lang.english');
Route::get('blog/single/{id}','BlogController@BlogSingle');

//Payment
Route::get('user/payment/page','CartController@paymentPage')->name('user.payment.page');
Route::post('user/payment/process','PaymentController@paymentProcess')->name('payment.process');
Route::post('user/payment/stripe','PaymentController@paymentCharge')->name('stripe.charge');


// Products in Shop
Route::get('products/subcategory/{id}','ProductController@productView');
Route::get('products/category/{id}','ProductController@productViewforCategory');
Route::get('products/brand/{id}','ProductController@productViewforBrand');

//Order Tracking
Route::post('user/order/tracking','ProductController@orderTracking')->name('order.tracking');

//Return Product Route frontend and admin both
Route::get('success/order/list','ProductController@successList')->name('success.product.list');
Route::get('return/request/{id}','ProductController@returnRequest');
Route::get('admin/return/request','Admin\ReturnController@returRequest')->name('admin.return.request');
Route::get('admin/product/return/approve/{id}','Admin\ReturnController@approveRequest');
Route::get('admin/return/request/all','Admin\ReturnController@returRequestall')->name('admin.return.request.all');

//Contact Page frontend and admin both Route 
Route::get('contact/page','ContactController@contactIndex')->name('contact.page');
Route::get('contact/page/form','ContactController@contactForm')->name('contact.form');
Route::get('admin/contact/all/message','ContactController@contactallMessage')->name('all.message');
Route::get('admin/contact/message/view/{id}','ContactController@contactMessageView');

// Search Route
Route::post('user/product/search','ProductController@searchProduct')->name('product.search');