<?php

return [
  'foodpresets' => [
      'path' => '/foodpresets',
      'target' => \ASK\AskCaloriecounter\Controller\FoodPresetController::class . '::listAction'
  ],
  'accounts' => [
      'path' => '/accounts',
      'target' => \ASK\AskCaloriecounter\Controller\AccountController::class . '::listAction'
  ]
];

?>