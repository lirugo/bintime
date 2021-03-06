<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="site-index">
   <div class="container">

       <div class="row">
           <div class="col-md-12">
               <div class="page-header text-center">
                   <h2>Users list page</h2>
               </div>
               <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/signup">
                            <button class="btn btn-sm btn-success pull-right">Create new user</button>
                        </a>
                        <button class="btn btn-sm btn-warning pull-left m-r-5">
                            <?php echo $sort->link('name'); ?>
                        </button>
                        <button class="btn btn-sm btn-warning pull-left m-r-5">
                            <?php echo $sort->link('created_at'); ?>
                        </button>
                    </div>
               </div>
           </div>
       </div>

       <div class="row">
           <div class="col-md-12 text-center">
               <?php
               // Display pagination
               echo LinkPager::widget([
                   'pagination' => $pagination,
               ]);
               ?>
           </div>
       </div>

       <div class="row">
           <?php foreach ($users as $user) { ?>
               <div class="col-md-4">
                   <div class="panel panel-default">
                       <div>
                        <img class="panel-img-top center" src="https://www.w3schools.com/howto/img_avatar.png" width="100%" alt="Card image cap">
                       </div>
                       <div class="panel-body">
                           <h2 class="text-center"> <?php echo $user->surname.' '.$user->name; ?></h2>
                           <p class="panel-text">
                               <?php echo $user->login; ?> <br/>
                               <?php echo $user->email; ?> <br/>
                               <?php echo Yii::$app->formatter->format($user->created_at, 'date');  ?> <br/>
                           </p>
                           <?php echo Html::a('Delete user', array('users/users/delete', 'id' => $user->id), array('class' => 'btn btn-sm btn-danger pull-right')); ?>
                           <?php echo Html::a('Edit user', array('users/users/update', 'id' => $user->id), array('class' => 'btn btn-sm btn-primary pull-right m-r-5')); ?>
                       </div>
                   </div>
               </div>
           <?php } ?>
       </div>

       <div class="row">
           <div class="col-md-12 text-center">
               <?php
               // Display pagination
               echo LinkPager::widget([
                   'pagination' => $pagination,
               ]);
               ?>
           </div>
       </div>

   </div>
</div>
