<?php

Route::get('/', 'HomeController@index');

// <editor-fold defaultstate="collapsed" desc="--Ajax--">
Route::get('/checkmahuyen','AjaxController@checkmahuyen');
Route::get('/checkmaxa','AjaxController@checkmaxa');
Route::get('/checkuser','AjaxController@checkuser');
Route::get('getXas','AjaxController@getXas');
Route::get('getChiTietTc','AjaxController@getChiTietTc');
Route::get('/addTcTx','AjaxController@addTcTx');
Route::get('/tcdoituongtx/check','AjaxController@checktcdoituongtx');
// </editor-fold>//End Ajax

// <editor-fold defaultstate="collapsed" desc="--Setting--">
Route::get('cau_hinh_he_thong','GeneralConfigsController@index');
Route::get('cau_hinh_he_thong/create','GeneralConfigsController@create');
Route::post('cau_hinh_he_thong','GeneralConfigsController@store');
Route::get('cau_hinh_he_thong/{id}/edit','GeneralConfigsController@edit');
Route::patch('cau_hinh_he_thong/{id}','GeneralConfigsController@update');
Route::get('/setting','GeneralConfigsController@setting');
Route::post('/setting','GeneralConfigsController@upsetting');

//Users
Route::get('login','UsersController@login');
Route::post('signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::post('/change-password','UsersController@cpw');
Route::get('/user_setting','UsersController@settinguser');
Route::post('/user_setting','UsersController@settinguserw');
//Route::get('/checkpass','UsersController@checkpass');
//Route::get('/checkuser','UsersController@checkuser');
Route::get('logout','UsersController@logout');
Route::get('users','UsersController@index');
Route::get('users/{id}/edit','UsersController@edit');
Route::patch('users/{id}','UsersController@update');
Route::get('users/{id}/permission','UsersController@permission');
Route::post('users/permission','UsersController@uppermission');
Route::post('users/delete','UsersController@destroy');
Route::get('users/lock/{ids}','UsersController@lockuser');
Route::get('users/unlock/{ids}','UsersController@unlockuser');

Route::get('users/print/pl={pl}','UsersController@prints');
//EndUsers

//Thông tin quận/huyện
Route::resource('districts','DistrictsController');
Route::post('districts/delete','DistrictsController@destroy');
//End Thông tin quận/huyện
//Thông tin xã phường
Route::resource('towns','TownsController');
Route::post('towns/delete','TownsController@destroy');
//End Thông tin xã phường

//Dm trợ cấp tx
Route::resource('dmtrocaptx','DmTroCapTxController');
Route::post('dmtrocaptx/delete','DmTroCapTxController@destroy');

//End dm đối tượng

// </editor-fold>//End Setting

// <editor-fold defaultstate="collapsed" desc="--Reports--">

// </editor-fold>//End Reports



// <editor-fold defaultstate="collapsed" desc="--Manage--">
Route::get('hosodexuat',function(){
    return view('manage.hosodexuat.doituongtx.index')

        ->with('pageTitle','Hồ sơ đề xuất');
});
//Danh sách đối tượng thường xuyên
Route::resource('danhsachdoituongtx','DsDoiTuongTxController');
Route::get('danhsachdoituongtx/{trocap}/create','DsDoiTuongTxController@create');
Route::post('danhsachdoituongtx/delete','DsDoiTuongTxController@destroy');
Route::post('danhsachdoituongtx/tralai','DsDoiTuongTxController@tralai');
Route::post('danhsachdoituongtx/chuyen','DsDoiTuongTxController@chuyen');
Route::post('danhsachdoituongtx/duyet','DsDoiTuongTxController@duyet');
Route::get('ajax/lydodttx','DsDoiTuongTxController@lydo');
//End danh sách đối tượng thường xuyên

//Trợ cấp đối tượng thường xuyên
Route::resource('trocapdoituongtx','TcDoiTuongTxController');
Route::get('trocapdoituongtx/{trocap}/create','TcDoiTuongTxController@create');
Route::post('trocapdoituongtx/duyet','TcDoiTuongTxController@duyet');
Route::post('trocapdoituongtx/delete','TcDoiTuongTxController@destroy');
    //Chi tiết trợ cấp đối tượng
Route::get('/trocapdoituongtxtc/truylinh','TcDoiTuongTxCtController@truylinh');
Route::get('/trocapdoituongtxtc/thongtin','TcDoiTuongTxCtController@thongtin');
Route::post('trocapdoituongtxct/truylinh','TcDoiTuongTxCtController@updatetruylinh');
Route::post('trocapdoituongtxct/duyet','TcDoiTuongTxCtController@duyet');
    //End chi tiết trợ cấp đối tượng

//End Trợ cấp đối tượng thường xuyên







// </editor-fold>//End Manage