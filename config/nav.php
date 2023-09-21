<?php
return[
  [
    'icon'=>'mdi mdi-speedometer',
    'route'=>'dashboard',
    'title'=>'dashboard',
    'active'=>'dashboard',
  ],
  [
    'icon'=>'mdi mdi-factory',
    'route'=>'categories',
    'title'=>'Category',
    'active'=>'categories',
    'ability'=>'categories.view'
  ],
  [
    'icon'=>'mdi mdi-food',
    'route'=>'foods',
    'title'=>'Food',
    'active'=>'food',
    'ability'=>'foods.view'
  ],
  [
    'icon'=>'mdi mdi-food-fork-drink',
    'route'=>'tables',
    'title'=>'Table',
    'active'=>'table',
    'ability'=>'tables.view'
  ],
  [
    'icon'=>'mdi mdi-',
    'route'=>'admins',
    'title'=>'Admin',
    'active'=>'admin',
    'ability'=>'tables.view'
  ],
  [
    'icon'=>'mdi mdi-account-circle',
    'route'=>'roles',
    'title'=>'Role',
    'active'=>'role',
    'ability'=>'roles.view'
  ],
];
