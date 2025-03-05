<?php

if (!function_exists('checkAuth')) {

  function checkAuth(): bool
  {
    return session()->has('role');
  }
}

if (!function_exists('checkSuperAdminPerm')) {
  function checkSuperAdminPerm(): bool
  {
    return session()->get('role') === 1;
  }
}
