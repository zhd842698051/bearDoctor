<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Category extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'category';
}
