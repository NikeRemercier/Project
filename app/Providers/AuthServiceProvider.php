<?php

namespace App\Providers;

use App\Models\user;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//
// use Illuminate\Http\Request;
//

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/*
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::define('cud_barang', function(user $u){
			return $u->id_level==1;
		});
        
		Gate::define('cud_supplier', function(user $u){
			return $u->id_level==1;
		});

		Gate::define('cud_sumber_dana', function(user $u){
			return $u->id_level==1;
		});

		Gate::define('cud_user', function (user $u){
			return $u->id_level==1;
		});

        Gate::define('cud_lokasi', function (user $u){
			return $u->id_level==1;
		});

        Gate::define('cud_detail_barang', function (user $u){
			return $u->id_level==1;
		});

        Gate::define('cud_barang_keluar', function (user $u){
			return $u->id_level==1;
		});

        Gate::define('cud_peminjaman_barang', function (user $u){
			return $u->id_level==1;
		});

        Gate::define('cud_perawatan_barang', function (user $u){
			return $u->id_level==1;
		});
	}
}
