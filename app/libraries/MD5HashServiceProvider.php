<?php

class MD5HashServiceProvider extends Illuminate\Support\ServiceProvider {
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
      $this->app['hash'] = $this->app->share(function () {
          return new MD5Hasher();
      });
  }
  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
      return array('hash');
  }
}
