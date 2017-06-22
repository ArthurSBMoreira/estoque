<?php

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::get('/produtos/todos', 'ProdutoController@todos');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
