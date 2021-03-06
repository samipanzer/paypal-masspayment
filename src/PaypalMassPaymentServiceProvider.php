<?php 

namespace   Amsify42\PaypalMassPayment;
use 	    Illuminate\Support\ServiceProvider;

class PaypalMassPaymentServiceProvider extends ServiceProvider {
	
	protected $defer = false;
	
	public function boot() {
		// this  for conig
		$this->publishes([
				__DIR__.'/config/paypalmasspayment.php' => config_path('paypalmasspayment.php'),
		], 'config' );
	}

	public function register() {
		$this->registerPaypalPayment();
		config([
				'config/paypalmasspayment.php',
			  ]);
	}

	private function registerPaypalPayment() {
		$this->app->bind('Amsify42\PaypalMassPayment\PaypalMassPaymentServiceProvider',function($app){
			return new PaypalMassPayment($app);
		});
	}


}
