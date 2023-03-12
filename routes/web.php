<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/blog', [
    AddController::class, 
    'allData'])
    ->name('blog');

Route::get('/blog/{id}', [
    AddController::class, 
    'showOneBlog']
    )->name('blog-one');

Route::get('/blog/{id}/update', [
    AddController::class, 
    'updateBlog']
    )->name('blog-update');
    
Route::post('/blog/{id}/update', [
    AddController::class, 
    'updateBlogSubmit']
    )->name('blog-update-submit');
    
Route::get('/blog/{id}/delete', [
    AddController::class, 
    'deleteBlog']   
    )->name('blog-delete');


Route::post('/blog/{id}/submit-comment', [
    AddController::class, 
    'submitComment']
)->name('comment-form');

Route::get('/blog/{dataId}/{comId}', [
    AddController::class, 
    'showOneComment']
    )->name('comment-one');

Route::get('/blog/{dataId}/{comId}/update', [
    AddController::class, 
    'updateComment']
    )->name('comment-update');
    
Route::post('/blog/{dataId}/{comId}/update', [
    AddController::class, 
    'updateCommentSubmit']
    )->name('comment-update-submit');
    
Route::get('/blog/{dataId}/{comId}/delete', [
    AddController::class, 
    'deleteComment']   
    )->name('comment-delete');


Route::get('/new_blog', function () {
    return view('new_blog');
})->name('new_blog');

Route::post('/new_blog/submit', [
    AddController::class, 
    'submit']
)->name('blog-form');
